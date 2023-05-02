<?php

add_app('/\?login.*', 'steamauth_login');
add_app('/logout/', 'steamauth_logout');

function steamauth_login() {
	try {
		$openid = new LightOpenID('http://' . get_setval('steamauth_loginDomen'));

		if (!$openid->mode) {
			if (isset($_GET['login'])) {
				$openid->identity = 'https://steamcommunity.com/openid';
				header('Location: ' . $openid->authUrl());
				wsexit();
			}
		} elseif ($openid->mode == 'cancel') {
			
		} else {

			if ($openid->validate()) {
				$id = $openid->identity;
				if(substr($id,0,27) == "https://steamcommunity.com/") {
                    $ptn = "/^https:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                    if (preg_match($ptn, $id)) {
                        preg_match($ptn, $id, $matches);

                        $url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . get_setval('steamauth_apiKey') . '&steamids=' . $matches[1];
                        $json_object = file_get_contents($url);
                        $json_decoded = @json_decode($json_object);

                        foreach ($json_decoded->response->players as $player) {
                            user_login($player);
                        }
                    } else {
                        add_log('', 'Not valid login');
                        redirect_srv_msg('', '/');
                    }
                }else{
                    add_log('', 'Not valid login err2');
                    redirect_srv_msg('', '/');
                }
			} else {
				add_log('', 'Not valid login err3 steam');
				redirect_srv_msg('', '/');
			}
		}
	} catch (ErrorException $e) {
		echo $e->getMessage();
	}
}

function steamauth_logout() {
	user_logout();
	redirect_srv_msg('', '/');
}

function get_user() {
	if (is_login()) {
		return user();
	}
	return false;
}

function user_login($user) {
	if (($authuser = get_user_by_steam_id($user->steamid))) {
		$authuser->set_name(mysqli_real_escape_string(db()->db, $user->personaname));
		$authuser->set_data('image', $user->avatarfull);
		$authuser->update();
		add_log($authuser->get_id(), 'login');
	} else {
        $adk2 = substr(md5(uniqid(rand(), 1)), 3, 10);
        $adk3 = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = md5($adk3 . bin2hex(random_bytes(10)) . $adk2);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = md5($key . $addKey);

		$authuser = new user();
		$authuser->set_name(mysqli_real_escape_string(db()->db, $user->personaname));
		$authuser->set_emailconfirmkey(safeescapestring(db()->nomysqlinj($key)));
		$authuser->set_login_via("steam");
		$authuser->add();

        $seedrandom = bin2hex(random_bytes(7));
        $ownrefcoderandom = bin2hex(random_bytes(8));
        $publicidrandomu = bin2hex(random_bytes(7)) . "" . bin2hex(random_bytes(7));

        $authuser->set_data('seed', $seedrandom);
		$authuser->set_data('steam_id', $user->steamid);
		$authuser->set_data('image', $user->avatarfull);
		$authuser->set_data('timecreated', time());
        $authuser->set_data('own_ref_code', $ownrefcoderandom);
        $authuser->set_publicid($publicidrandomu);
		$authuser->update();
		add_log($authuser->get_id(), 'registration');
		update_setval('opencase_count_users', get_setval('opencase_count_users') + 1);
		centrifugo::sendStats();
	}
	if (!$authuser->get_banned()) {
		$authuser->set_auth_cookie();
		redirect_srv_msg('', '/');
	} else {
		user_logout();
		exit('You are banned');
	}
}

function user_logout() {
	if (($user = get_user())) {
		$user->clear_auth_cookie();
	}
}

function get_user_by_steam_id($steam_id) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gubystidch".$steam_id;

    $userdata = '';

    if (!$redis->get($cachekey)) {
        $userdata = db()->query_once('SELECT user_id from users_data INNER JOIN user_fields ON user_fields.id = users_data.user_field_id WHERE user_fields.key = \'steam_id\' AND users_data.value = "' . safeescapestring(db()->nomysqlinj($steam_id)) . '"');
        $redis->set($cachekey, serialize($userdata));
        $redis->expire($cachekey, 5);
    } else {
        $userdata = unserialize($redis->get($cachekey));
    }

	if ($userdata['user_id']) {
		return new user($userdata['user_id']);
	}
	return false;
}
function get_user_by_publicid($publicid) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getubypubidch".$publicid;

    $userdata = '';

    if (!$redis->get($cachekey)) {
        $userdata = db()->query_once('SELECT id from users WHERE publicid = "' . safeescapestring(db()->nomysqlinj($publicid)) . '"');
        $redis->set($cachekey, serialize($userdata));
        $redis->expire($cachekey, 5);
    } else {
        $userdata = unserialize($redis->get($cachekey));
    }

    if ($userdata['id']) {
        return new user($userdata['id']);
    }
    return false;
}