<?php

add_post('/api/activity/(([0-9]+)/)?(([0-9]+)/)?', 'externalapi_api_activity');
add_post('/api/itemlist/update/', 'externalapi_api_upload_items');
add_post('/api/currencies/rates/update/', 'externalapi_api_update_currencies_rates');
add_post('/api/market/tick/', 'externalapi_api_market_tick');
add_post('/api/check/', 'externalapi_api_check');
add_post('/api/autosell/', 'externalapi_api_autosellitems');
add_post('/api/rainon/', 'externalapi_api_rainon');
add_post('/api/rainoff/', 'externalapi_api_rainoff');

function externalapi_api_check_auth() {
	if (!empty($authKey = getheader('Authorization'))) {
		if (stripos($authKey, 'basic ') === 0) {
			$authKey = substr($authKey, 6);
			if ($authKey == get_setval('api_scretkey')) {
				return;
			}
		}
	}
	header_error(401);
	$json = ['success' => false, 'error' => 'Incorrect or missing key'];
	echo_json($json);
}


function externalapi_api_market_tick($args) {
	externalapi_api_check_auth();
	$error = '';
	if (market_tick($error)) {
		$json = ['success' => true];
	} else {
		$json = ['success' => false, 'error' => $error];
	}
	echo_json($json);
}

function externalapi_api_upload_items($args) {
	externalapi_api_check_auth();
	$item = new item();
	$error = '';
	$json = ['success' => true, 'msg' => 'Ok.'];

	echo_json($json);
}

function externalapi_api_update_currencies_rates($args) {
	externalapi_api_check_auth();
	if (isset($_POST['eur'])) {
		update_setval('opencase_eur_cost', $_POST['eur']);
	}
	if (isset($_POST['usd'])) {
		update_setval('opencase_usd_cost', $_POST['usd']);
	}
	$json = ['success' => true, 'usd' => get_setval('opencase_usd_cost'), 'eur' => get_setval('opencase_eur_cost')];
	echo_json($json);
}

function externalapi_api_activity($args) {
	externalapi_api_check_auth();
	$json = array('success' => false);
	$interval = isset($args[1]) ? safeescapestring(db()->nomysqlinj($args[1])) : 10;
	$count = isset($args[3]) ? safeescapestring(db()->nomysqlinj($args[3])) : 60;
	$startTime = db()->query_once('select TIME_TO_SEC(NOW()) - TIME_TO_SEC(NOW()) % (' . safeescapestring(db()->nomysqlinj($interval)) . ') as dat');
	$startTime = $startTime['dat'];
	$intervalsQuery = db()->query('SELECT COUNT(id) as cn, MAX(`time_drop`) AS `dt`, TIME_TO_SEC(`time_drop`) - TIME_TO_SEC(`time_drop`) % (' . safeescapestring(db()->nomysqlinj($interval)) . ') AS `dat` FROM `opencase_droppeditems` GROUP BY `dat` ORDER BY `dt` DESC LIMIT ' . safeescapestring(db()->nomysqlinj($count)));
	$intevals = array();
	foreach ($intervalsQuery as $intevalQuery) {
		$intevals[$intevalQuery['dat']] = $intevalQuery;
	}
	$result = array();
	for ($i = 0; $i < $count; $i++) {
		$time = $startTime - $i * $interval;
		if (isset($intevals[$time])) {
			$result[] = array('count' => $intevals[$time]['cn'], 'dat' => $intevals[$time]['dat']);
		} else {
			$result[] = array('count' => 0, 'dat' => $time);
		}
		$json['success'] = true;
		$json['data'] = $result;
	}
	echo_json($json);
}


function externalapi_api_check() {
	externalapi_api_check_auth();
	$json = ['success' => true];
	echo_json($json);
}

function externalapi_api_autosellitems() {
    externalapi_api_check_auth();
    $json = array('success' => false);
    $cautosolditms = 0;
    if (get_setval('opencase_auto_sell') == 1) {
        $items = db()->query('select * from opencase_droppeditems where status = 0 and (unix_timestamp(`time_drop`) - unix_timestamp(NOW()) + '. (get_setval('opencase_auto_sell_time') * 60) . ') < 0');
        if (count($items) > 0) {
            foreach ($items as $item) {
                if ($item['status'] == 0) {
                    $user = new user($item['user_id']);
                    inc_user_balance($user, $item['price']);
                    add_balance_log($user->get_id(), $item['price'], 'Auto sell dItem' . $item['id'], 2);
                    db()->query_once('update opencase_droppeditems set status = 3 where id = ' . safeescapestring(db()->nomysqlinj($item['id'])));
                    ch()->delete('droppedItem'.$item['id']);
                    centrifugo::messageSystem($item['user_id'], "Your NFT ".$item['name']." has been automatically sold because of no action in 7 days", "", "success");
                    centrifugo::updateBalance($item['user_id'], get_user_balance($user));
                    $cautosolditms += 1;
                }
            }
        }
    }

    $json['success'] = true;
    $json['msg'] = 'autosold'.$cautosolditms.'itemssuccess';
    echo_json($json);
}

function externalapi_api_rainon()
{
    externalapi_api_check_auth();
    $json = ['success' => false];
    centrifugo::rainOff();

    db()->query_once('update rain set `status` = 0 where status = 1');

    $rainamount = mt_rand(10, 20);

    $rain = new rain();
    $rain->set_amount($rainamount);
    $rain->set_status(1);
    $rain->add_rain();

    centrifugo::rainOn();

    $json = ['success' => true, 'msg' => 'Rain ON successfully.'];
    echo_json($json);
}

function externalapi_api_rainoff()
{
    externalapi_api_check_auth();
    $json = ['success' => false];
    centrifugo::rainOff();

    $rain = db()->query_once('select * from rain where status = 1 ORDER BY id DESC LIMIT 1');

    db()->query_once('update rain set `status` = 0 where status = 1');

    $rainlog = db()->query('select * from rainlog where rainid = "'.$rain['id'].'"');

    foreach ($rainlog as $ur) {
        $userr = new user($ur['userid']);
        $usertotaldepo_last4days = db()->query_once('select SUM(sum) AS sumdep from opencase_deposite where user_id = "'.safeescapestring(db()->nomysqlinj(user()->get_id())).'" AND status = 1 AND time_add >= NOW() - INTERVAL 5 DAY');
        $usertotaldepo_last4days = $usertotaldepo_last4days['sumdep'];
        if ($usertotaldepo_last4days >= 5) {
            $rainamount_multipler = db()->query_once('select * from rain where id = "'.$ur['rainid'].'" ORDER by id DESC LIMIT 1');
            $rainamount_multipler = $rainamount_multipler['amount'];
            $mts = round((mt_rand(111, 444)) / 1000, 2);
            $rainamount = round((($usertotaldepo_last4days * $rainamount_multipler) / 10000) * $mts, 2);
            if ($rainamount <= 0) {
                $rainamount = 0.01;
            }

            inc_user_balance($userr, $rainamount);
            add_balance_log($userr->get_id(), $rainamount, 'Rain №' . $ur['rainid'], 8);

            db()->query_once('update rainlog set `amount` = '.$rainamount.' where id = '.$ur['id']);

            centrifugo::messageSystem($ur['userid'], "You've claimed €".$rainamount." from the rain.", "", "success");
            centrifugo::updateBalance($ur['userid'],get_user_balance($userr));
        } else {
            if ($userr->get_firstrain() == 0) {

                $userr->set_firstrain(1);
                $userr->update();
                inc_user_balance($userr, 0.01);
                add_balance_log($userr->get_id(), 0.01, 'Rain №' . $ur['rainid'], 8);

                db()->query_once('update rainlog set `amount` = 0.01 where id = '.$ur['id']);

                centrifugo::messageSystem($ur['userid'], "You've claimed €0.01 from the rain.", "", "success");
                centrifugo::updateBalance($ur['userid'],get_user_balance($userr));
            }
        }
    }
    $json = ['success' => true, 'msg' => 'Rain OFF successfully.'];
    echo_json($json);
}