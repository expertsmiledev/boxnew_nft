<?php

function get_user_balance($user) {
	return $user->get_data('balance');
}

function get_user_exp($user) {
    return $user->get_data('exp');
}

function set_user_balance($user, $balance) {
	$user->upd_data('balance', $balance);
}

function set_user_exp($user, $exp) {
    $user->upd_data('exp', $exp);
}

function inc_user_exp($user, $plus) {
    set_user_exp($user, get_user_exp($user) + $plus);
}


function inc_user_balance($user, $plus) {
	set_user_balance($user, get_user_balance($user) + $plus);
}

function dec_user_balance($user, $minus) {
	set_user_balance($user, get_user_balance($user) - $minus);
}

function get_user_banned_label($user) {
	return $user->get_banned() ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>';
}

function get_user_count_cases($user) {
	$count = db()->query_once('select count(id) from opencase_opencases where user_id = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '"');
	return $count['count(id)'];
}

function get_user_status_array() {
	return array(0 => 'User', 1 => 'Media partner', 10 => 'Editor', 11 => 'Moderator', 12 => 'Administrator', 100 => 'Bot');
}

function get_user_status_text($user) {
	$arr = get_user_status_array();
	return $arr[$user->get_data('status')];
}

function get_user_time_from_reg_text($user) {
	$text = '';
	$time_from_reg = get_user_time_from_reg($user);
	if ($time_from_reg >= 365) {
		$years = intval($time_from_reg / 365);
		if (($years >= 10 && $years < 20) || ($years % 10 == 0 || $years % 10 >= 5 && $years % 10 <= 9)) {
			$text = ' years';
		} else {
			if ($years % 10 == 1) {
				$text = ' year';
			} else {
				$text = ' years';
			}
		}
		$text = $years . $text;
	} else {
		$days = intval($time_from_reg);
		if (($days >= 10 && $days < 20) || ($days % 10 == 0 || $days % 10 >= 5 && $days % 10 <= 9)) {
			$text = ' days';
		} else {
			if ($days % 10 == 1) {
				$text = ' day';
			} else {
				$text = ' days';
			}
		}
		$text = $days . $text;
	}
	return $text;
}

function get_user_time_from_reg($user, $format = 'd') {
	$time_from_reg = time() - datef($user->get_time_reg());
	if ($time_from_reg == 's')
		return ($time_from_reg) / 60;
	if ($time_from_reg == 'h')
		return ($time_from_reg) / 3600;
	return ($time_from_reg) / 86400;
}

function is_locked_user($user) {
	return isset($_SESSION['locked'][$user->get_id()]) ? $_SESSION['locked'][$user->get_id()] : false;
}

function lock_user($user) {
	$_SESSION['locked'][$user->get_id()] = true;
}

function unlock_user($user) {
	$_SESSION['locked'][$user->get_id()] = false;
}

function get_user_ids_by_status($status, $order = false, $limit = false) {
	$order = order($order);
	$limit = limit($limit);

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gusidbystch".$status.$order.$limit;

    $usersdata = '';

    if (!$redis->get($cachekey)) {
        $usersdata = db()->query('SELECT user_id from users_data INNER JOIN user_fields ON user_fields.id = users_data.user_field_id WHERE user_fields.key = \'status\' AND users_data.value = "' . safeescapestring(db()->nomysqlinj($status)) . '"' . safeescapestring(db()->nomysqlinj($order)) . safeescapestring(db()->nomysqlinj($limit)));
        $redis->set($cachekey, serialize($usersdata));
        $redis->expire($cachekey, 10);
    } else {
        $usersdata = unserialize($redis->get($cachekey));
    }

	$user_ids = [];
	foreach ($usersdata as $data) {
		$user_ids[] = (int) $data['user_id'];
	}
	return $user_ids;
}

function get_maxbalance_users($limit = 5) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "maxbalusersch".$limit;

    $usersdata = '';

    if (!$redis->get($cachekey)) {
        $usersdata = db()->query('SELECT user_id from users_data INNER JOIN user_fields ON user_fields.id = users_data.user_field_id WHERE user_fields.key = \'balance\' ORDER BY users_data.value DESC LIMIT ' . safeescapestring(db()->nomysqlinj($limit)));
        $redis->set($cachekey, serialize($usersdata));
        $redis->expire($cachekey, 10);
    } else {
        $usersdata = unserialize($redis->get($cachekey));
    }

	$users = [];
	foreach ($usersdata as $data) {
		$users[] = new user($data['user_id']);
	}
	return $users;
}

function search_user($search) {
	$user_ids = [];
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "searchusch".$search;

    $usersdata = '';

    if (!$redis->get($cachekey)) {
        $usersdata = db()->query('SELECT user_id from users_data INNER JOIN user_fields ON user_fields.id = users_data.user_field_id WHERE user_fields.key = \'steam_id\' AND users_data.value like "%' . safeescapestring(db()->nomysqlinj($search)) . '%" LIMIT 10');
        $redis->set($cachekey, serialize($usersdata));
        $redis->expire($cachekey, 10);
    } else {
        $usersdata = unserialize($redis->get($cachekey));
    }

	foreach ($usersdata as $data) {
		$user_ids[$data['user_id']] = (int) $data['user_id'];
	}

    $cachekey = "searchusch2x".$search;

    $usersdata = '';

    if (!$redis->get($cachekey)) {
        $usersdata = db()->query('SELECT id from users WHERE name like "%' . safeescapestring(db()->nomysqlinj($search)) . '%" LIMIT 10');
        $redis->set($cachekey, serialize($usersdata));
        $redis->expire($cachekey, 10);
    } else {
        $usersdata = unserialize($redis->get($cachekey));
    }

	foreach ($usersdata as $data) {
		$user_ids[$data['id']] = (int) $data['id'];
	}
	$users = [];
	foreach ($user_ids as $id) {
		$users[] = new user($id);
	}
	return $users;
}

function get_user_best_drop($user) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gubdropch".$user->get_id();

    $data = '';

    if (!$redis->get($cachekey)) {
        $data = db()->query_once('SELECT id FROM opencase_droppeditems WHERE user_id="' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" ORDER BY price DESC');
        $redis->set($cachekey, serialize($data));
        $redis->expire($cachekey, 10);
    } else {
        $data = unserialize($redis->get($cachekey));
    }

	if (isset($data['id'])) {
		return new droppedItem($data['id']);
	}
	return false;
}

function get_user_favorite_case($user) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "gubfavcsch".$user->get_id();

    $data = '';

    if (!$redis->get($cachekey)) {
        $data = db()->query_once('SELECT case_id, (COUNT(1)) AS maxcount FROM opencase_opencases WHERE user_id="' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" GROUP BY case_id ORDER BY maxcount DESC');
        $redis->set($cachekey, serialize($data));
        $redis->expire($cachekey, 10);
    } else {
        $data = unserialize($redis->get($cachekey));
    }

	if (isset($data['case_id'])) {
		return new ocase($data['case_id']);
	}
	return false;
}
