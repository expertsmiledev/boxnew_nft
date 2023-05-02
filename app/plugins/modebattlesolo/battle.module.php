<?php

//function get_user_count_battles($user) {
//	$count = db()->query_once('select count(id) from opencase_battle where creator_id = "' . $user->get_id() . '" OR participant_id = "' . $user->get_id() . '"');
//	return $count['count(id)'];
//}

function get_user_count_battles($user) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getusercbattles".$user->get_id();

    $count = '';

    if (!$redis->get($cachekey)) {
        $count = db()->query_once('SELECT 
		COUNT(CASE WHEN winner_id = ' . safeescapestring(db()->nomysqlinj($user->get_id())) . ' THEN 1 ELSE NULL END) AS won,
		COUNT(CASE WHEN winner_id <> ' . safeescapestring(db()->nomysqlinj($user->get_id())) . ' AND winner_id <> -1 THEN 1 ELSE NULL END) AS lost,
		COUNT(CASE WHEN winner_id = -1 THEN 1 ELSE NULL END) AS draw
		FROM opencase_battle WHERE creator_id = ' . safeescapestring(db()->nomysqlinj($user->get_id())) . ' OR participant_id = ' . safeescapestring(db()->nomysqlinj($user->get_id())) . ''
        );
        $redis->set($cachekey, serialize($count));
        $redis->expire($cachekey, 15);
    } else {
        $count = unserialize($redis->get($cachekey));
    }

	return [
		'won' => $count['won'],
		'lost' => $count['lost'],
		'draw' => $count['draw'],
        'total' => $count['won']+$count['lost']+$count['draw']
	];
}

function get_count_battles() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getcountbattlesch";

    $count = '';

    if (!$redis->get($cachekey)) {
        $count = db()->query_once('SELECT COUNT(1) as active FROM opencase_battle WHERE status IN (0, 1)');
        $redis->set($cachekey, serialize($count));
        $redis->expire($cachekey, 4);
    } else {
        $count = unserialize($redis->get($cachekey));
    }

	return [
		'active' => $count['active'],
		'total' => get_setval('opencase_count_battles') + $count['active']
	];
}

function get_last_battle() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $cachekey = "getlastbattlech";

    $battles = '';

    if (!$redis->get($cachekey)) {
        $battles = battle::getBattles('status = ' . battle::STATUS_FINISHED . ' AND  finished_at <= NOW()', 'id DESC', 1);
        $redis->set($cachekey, serialize($battles));
        $redis->expire($cachekey, 3);
    } else {
        $battles = unserialize($redis->get($cachekey));
    }

	if (!empty($battles)) {
		$battle = array_shift($battles);
		$case = $battle->getCase();
		return [
			'creator' => $battle->getUserData($battle->getCreator()),
			'participant' => $battle->getUserData($battle->getParticipant()),
			'winnerId' => $battle->getWinnerId(),
			'status' => $battle->getStatus(),
			'price' => $battle->getPrice(),
			'case' => [
				'caseId' => $case->get_id(),
				'key' => $case->get_key(),
				'name' => $case->get_name(),
				'image' => $case->get_src_image(),
				'items' => $battle->getItemsInCase()
			]
		];
	}
	return false;
}
