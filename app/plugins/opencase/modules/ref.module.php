<?php

function get_referrer($user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user = get_user();
			$user_id = $user->get_id();
		} else {
			return false;
		}
	}
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getreferch".$user_id;

    $referrer = '';

    if (!$redis->get($cachekey)) {
        $referrer = db()->query_once('select * from referral_user where referral_id = "' . safeescapestring(db()->nomysqlinj($user_id)) . '"');
        $redis->set($cachekey, serialize($referrer));
        $redis->expire($cachekey, 20);
    } else {
        $referrer = unserialize($redis->get($cachekey));
    }

	if ($referrer['id'] != '') {
		$user = new user($referrer['referrer_id']);
		return $user;
	} else {
		return false;
	}
}

function is_have_referrer_code() {
	return isset($_COOKIE['referrer']) && $_COOKIE['referrer'] != '' && !get_referrer($_COOKIE['referrer']);
}

function get_user_referrals_count($user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user = get_user();
			$user_id = $user->get_id();
		}
	}
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gurefcounch".$user_id;

    $count = '';

    if (!$redis->get($cachekey)) {
        $count = db()->query_once('select count(id) from referral_user where `referrer_id` = ' . safeescapestring(db()->nomysqlinj($user_id)));
        $redis->set($cachekey, serialize($count));
        $redis->expire($cachekey, 20);
    } else {
        $count = unserialize($redis->get($cachekey));
    }


	return $count['count(id)'] ? $count['count(id)'] : 0;
}

function get_user_percent($user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user = get_user();
			$user_id = $user->get_id();
		}
	}
	return get_setval('ref_referrer_rewards_from_deposite');
}

function get_user_refferals_deposite($user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user = get_user();
			$user_id = $user->get_id();
		}
	}
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "turefdeposch".$user_id;

    $usersQ = '';

    if (!$redis->get($cachekey)) {
        $usersQ = db()->query('select referral_id from referral_user where referrer_id = ' . safeescapestring(db()->nomysqlinj($user_id)));
        $redis->set($cachekey, serialize($usersQ));
        $redis->expire($cachekey, 15);
    } else {
        $usersQ = unserialize($redis->get($cachekey));
    }

	$users = array();
	foreach ($usersQ as $userQ) {
		array_push($users, $userQ['referral_id']);
	}
	if (count($users) > 0) {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        $cachekey = "guchsumch".$user_id;

        $sum = '';

        if (!$redis->get($cachekey)) {
            $sum = db()->query_once('select sum(`sum`) as sm from opencase_deposite where user_id in (' . implode(',', $users) . ')');
            $redis->set($cachekey, serialize($sum));
            $redis->expire($cachekey, 15);
        } else {
            $sum = unserialize($redis->get($cachekey));
        }

		$sum = $sum['sm'] ? $sum['sm'] : 0;
	} else {
		$sum = 0;
	}
	return $sum;
}

function get_user_ref_profit($user_id = false) {
	if (!$user_id) {
		if (is_login()) {
			$user = get_user();
			$user_id = $user->get_id();
		}
	}
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gusrefprf".$user_id;

    $sum = '';

    if (!$redis->get($cachekey)) {
        $sum = db()->query_once('select sum(`change`) as ch from opencase_balancelog where `user_id` = ' . safeescapestring(db()->nomysqlinj($user_id)) . ' and `type` = 4');
        $redis->set($cachekey, serialize($sum));
        $redis->expire($cachekey, 15);
    } else {
        $sum = unserialize($redis->get($cachekey));
    }

	return $sum['ch'] ? $sum['ch'] : 0;
}
