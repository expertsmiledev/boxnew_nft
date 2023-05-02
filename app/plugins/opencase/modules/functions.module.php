<?php

function rate_limit_check($user_ip_address, $ratename, $maxcalls, $timeperiod){
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $max_calls_limit  = $maxcalls;
    $time_period      = $timeperiod;
    $total_user_calls = 0;

    if (!$redis->exists($user_ip_address.$ratename)) {
        $redis->set($user_ip_address.$ratename, 1);
        $redis->expire($user_ip_address.$ratename, $time_period);
        $total_user_calls = 1;
        return false;
    } else {
        $redis->INCR($user_ip_address.$ratename);
        $total_user_calls = $redis->get($user_ip_address.$ratename);
        if ($total_user_calls > $max_calls_limit) {
            return true;
        }else{
            return false;
        }
    }
    return true;
}

function get_last_dropped_items() {
	$dItems = new droppedItem();

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "lastdropitems";

    $lastdroppeditems = '';

    if (!$redis->get($cachekey)) {
        $lastdroppeditems = $dItems->get_newDroppedItems('', 'DESC', 20);
        $redis->set($cachekey, serialize($lastdroppeditems));
        $redis->expire($cachekey, 20);
    } else {
        $lastdroppeditems = unserialize($redis->get($cachekey));
    }

	return $lastdroppeditems;
}

function get_case_category() {
	$caseCategory = new caseCategory();
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getcasecategorys";

    $casecategoryreturn = '';

    if (!$redis->get($cachekey)) {
        $casecategoryreturn = $caseCategory->get_caseCategorys('', 'pos ASC');
        $redis->set($cachekey, serialize($casecategoryreturn));
        $redis->expire($cachekey, 30);
    } else {
        $casecategoryreturn = unserialize($redis->get($cachekey));
    }

	return $casecategoryreturn;
}

function get_user_drops($user_id, $where = false, $page = 0, $count = 18) {
	$droppedItem = new droppedItem();
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getusedich".$user_id.$where.$page.$count;

    $guserdrops = '';

    if (!$redis->get($cachekey)) {
        $guserdrops = $droppedItem->get_droppedItems('publicid = "' . safeescapestring(db()->nomysqlinj($user_id)) .'"' . ($where ? ' and ' . $where : ''), 'id DESC', $count > 0 ? (safeescapestring(db()->nomysqlinj($page)) * $count) . ', ' . $count : '');
        $redis->set($cachekey, serialize($guserdrops));
        $redis->expire($cachekey, 20);
    } else {
        $guserdrops = unserialize($redis->get($cachekey));
    }

	return $guserdrops;
}

function get_top_users($limit = 50, $page = 0) {
	$sql = 'SELECT user_id, (SUM(CASE WHEN status = 3 THEN price ELSE 0 END) - (SELECT SUM(sum) FROM `opencase_deposite` WHERE user_id = opencase_droppeditems.user_id)) as profit, COUNT(CASE WHEN `from` > 0 THEN 1 END) as cases FROM opencase_droppeditems WHERE user_id NOT IN (SELECT user_id FROM users_data WHERE value = 1 AND user_field_id = (SELECT id FROM user_fields WHERE `key` = "top_disabled" LIMIT 1)) GROUP BY user_id HAVING profit > 0 ORDER BY profit DESC LIMIT ' . ($page * $limit) . ', ' . $limit;

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gettopusersch".$limit.$page;

    $res = '';

    if (!$redis->get($cachekey)) {
        $res = db()->query($sql);
        $redis->set($cachekey, serialize($res));
        $redis->expire($cachekey, 50);
    } else {
        $res = unserialize($redis->get($cachekey));
    }

	$users = [];
	foreach ($res as $row) {
		$user = new user($row['user_id']);
		$users[] = [
			'id' => $user->get_id(),
			'name' => $user->get_name(),
			'cases' => (int) $row['cases'],
			'profit' => (int) $row['profit'],
			'steam_id' => $user->get_data('steam_id'),
            'publicid' => $user->get_publicid(),
			'image' => $user->get_data('image')
		];
	}
	return $users;
}

function sortItemInCasseByClass($a, $b) {
	if ($a->get_item_class()->get_quality() == $b->get_item_class()->get_quality()) {
		return 0;
	}
	return ($a->get_item_class()->get_quality() < $b->get_item_class()->get_quality()) ? -1 : 1;
}

function sortItemInCasseByPrice($a, $b) {
	if ($a->get_item_class()->get_price() == $b->get_item_class()->get_price()) {
		return 0;
	}
	return ($a->get_item_class()->get_price() < $b->get_item_class()->get_price()) ? 1 : -1;
}

function sortItemInCasseByPosition($a, $b) {
	if ($a->get_position() == $b->get_position()) {
		return 0;
	}
	return ($a->get_position() < $b->get_position()) ? -1 : 1;
}

function sortItemByPrice($a, $b) {
	if ($a['price'] == $b['price']) {
		return 0;
	}
	return ($a['price'] < $b['price']) ? -1 : 1;
}

function get_count_opencase($case_id, $user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user_id = user()->get_id();
		} else {
			return 0;
		}
	}
	$case_id = safeescapestring(db()->nomysqlinj($case_id));
	$user_id = safeescapestring(db()->nomysqlinj($user_id));

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gcopench".$case_id.$user_id;

    $countCases = '';

    if (!$redis->get($cachekey)) {
        $countCases = db()->query_once('select count(1) from opencase_opencases INNER JOIN opencase_droppeditems ON opencase_opencases.item_id = opencase_droppeditems.id where opencase_opencases.user_id = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' and opencase_opencases.case_id = ' . safeescapestring(db()->nomysqlinj($case_id)) . ' and opencase_droppeditems.from > 0');
        $redis->set($cachekey, serialize($countCases));
        $redis->expire($cachekey, 10);
    } else {
        $countCases = unserialize($redis->get($cachekey));
    }
	return $countCases['count(1)'] ? intval($countCases['count(1)']) : 0;
}

function get_count_case_per_period($case_id, $user_id = false) {
	//$user_id = $user_id ? $user_id : is_login() ? user()->get_id() : 0;
    $user_id = $user_id ? $user_id : (is_login() ? user()->get_id() : 0);

	$case_id = safeescapestring(db()->nomysqlinj($case_id));
	$user_id = safeescapestring(db()->nomysqlinj($user_id));

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gccppch".$case_id.$user_id;

    $countCases = '';

    if (!$redis->get($cachekey)) {
        $countCases = db()->query_once('select count(id) from opencase_opencases where user_id = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' and case_id = ' . safeescapestring(db()->nomysqlinj($case_id)) . ' and time_open >= DATE_SUB(NOW(), INTERVAL '.get_setval('opencase_deposit_check_day').' DAY)');
        $redis->set($cachekey, serialize($countCases));
        $redis->expire($cachekey, 10);
    } else {
        $countCases = unserialize($redis->get($cachekey));
    }

	return $countCases['count(id)'] ? intval($countCases['count(id)']) : 0;
}

function get_time_before_deposit_case_free_open($case_id, $user_id = false) {
	//$user_id = $user_id ? $user_id : is_login() ? user()->get_id() : 0;
      $user_id = $user_id ? $user_id : (is_login() ? user()->get_id() : 0);
	$case_id = safeescapestring(db()->nomysqlinj($case_id));
	$user_id = safeescapestring(db()->nomysqlinj($user_id));

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gtbdcfoch".$case_id.$user_id;

    $dateData = '';

    if (!$redis->get($cachekey)) {
        $dateData = db()->query_once('select TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(time_open, INTERVAL '.get_setval('opencase_deposit_check_day').' DAY)) as before_open from opencase_opencases where user_id = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' and case_id = ' . safeescapestring(db()->nomysqlinj($case_id)) . ' and time_open >= DATE_SUB(NOW(), INTERVAL '.get_setval('opencase_deposit_check_day').' DAY) ORDER BY time_open ASC LIMIT 1');
        $redis->set($cachekey, serialize($dateData));
        $redis->expire($cachekey, 10);
    } else {
        $dateData = unserialize($redis->get($cachekey));
    }

	return max(0, $dateData['before_open'] ? intval($dateData['before_open']) : 0);
}

function get_count_deposite_per_period($user_id = false) {
	//$user_id = $user_id ? $user_id : is_login() ? user()->get_id() : 0;
    $user_id = $user_id ? $user_id : (is_login() ? user()->get_id() : 0);
	$user_id = safeescapestring(db()->nomysqlinj($user_id));
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gcdpphfn".$user_id;

    $sumDep = '';

    if (!$redis->get($cachekey)) {
        $sumDep = db()->query_once('select sum(`sum`) as sm from opencase_deposite where user_id = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' and time_add >=  DATE_SUB(NOW(), INTERVAL '.get_setval('opencase_deposit_check_day').' DAY)');
        $redis->set($cachekey, serialize($sumDep));
        $redis->expire($cachekey, 10);
    } else {
        $sumDep = unserialize($redis->get($cachekey));
    }

	return $sumDep['sm'] ? intval($sumDep['sm']) : 0;
}

function can_open_free_case($case, $count_open = false, $sum_deposite = false, $user_id = false) {
	$case_id = $case->get_id();
	//$user_id = $user_id ? $user_id : is_login() ? user()->get_id() : 0;
    $user_id = $user_id ? $user_id : (is_login() ? user()->get_id() : 0);
	$user_id = safeescapestring(db()->nomysqlinj($user_id));
	if (!$count_open)
		$count_open = get_count_case_per_period($case_id, $user_id);
	if (!$sum_deposite) {
		$sum_deposite = get_count_deposite_per_period($user_id);
	}
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "cofch".$user_id;

    $dbqcn = '';

    if (!$redis->get($cachekey)) {
        $dbqcn = db()->query_once('SELECT * FROM users_data WHERE user_field_id = 20 AND user_id = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' LIMIT 1');
        $redis->set($cachekey, serialize($dbqcn));
        $redis->expire($cachekey, 15);
    } else {
        $dbqcn = unserialize($redis->get($cachekey));
    }

    if (empty($dbqcn)){
        return false;
    }
    if (empty($dbqcn['value']) || $dbqcn['value'] == "" || $dbqcn['value'] == " "){
        return false;
    }
	return $count_open < $case->get_dep_open_count() && $sum_deposite >= $case->get_dep_for_open();
}

function get_count_open_cases() {
	return number_format(get_setval('opencase_count_open_case'), 0, '', ' ');
}


function get_count_reg_users() {
	return number_format(get_setval('opencase_count_users'), 0, '', ' ');
}

function get_count_onlie() {
    return get_online();
}


function get_count_today_open_cases() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gctoopca";

    $count = '';

    if (!$redis->get($cachekey)) {
        $count = db()->query_once('SELECT COUNT(1) FROM opencase_droppeditems WHERE `from` > 0 && time_drop > CURDATE()');
        $redis->set($cachekey, serialize($count));
        $redis->expire($cachekey, 10);
    } else {
        $count = unserialize($redis->get($cachekey));
    }

	return $count['COUNT(1)'] ?? 0;
}

function get_pre_delete_category() {
	$category = new caseCategory();
	$category->set_parametrs(-1, 'Remote cases', 10000, 1);
	return $category;
}

function file_get_contents_https($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function get_weighted_arithmetic_mean($data) {
	$avg = array_sum($data) / count($data);
	$sumErr = 0;
	$err = [];
	foreach ($data as $key => $price) {
		$err[$key] = ($avg - $price) ** 2;
		$sumErr += $err[$key];
	}
	if ($sumErr == 0) {
		return $avg;
	}
	$newSum = 0;
	$sumQ = 0;
	foreach ($data as $key => $price) {
		$q = (1 - ($err[$key] / $sumErr)) ** 6;
		$sumQ += $q;
		$newSum += $price * $q;
	}
	return $newSum / $sumQ;
}

function safeescapestring($string){
    $str2 = str_replace('%', '', $string);
    $str2 = str_replace('_', '', $str2);
    $str2 = str_replace('"', '', $str2);
    $str2 = str_replace("'", '', $str2);
    $str2 = str_replace('*', '', $str2);
    $str2 = str_replace('<', '', $str2);
    $str2 = str_replace('>', '', $str2);
    $str2 = str_replace('^', '', $str2);
    $str2 = str_replace('|', '', $str2);
    $str2 = mb_ereg_replace("[\x00\x0A\x0D\x1A\x22\x25\x27]", '\\$0', $str2);
    //if (empty($str2) || $str2 == "" || $str2 == " "){
        //$str2 = "basictext";
    //}

    return $str2;
}