<?php

function get_online() {
    $count = 1;
    try {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        $cachekey = "countonline";

        $count = '';
        if (!$redis->get($cachekey)) {
            if(count((array)centrifugo::getOnline())) {
                $count = centrifugo::getOnline()->result->nodes[0]->num_users;
            }else{
                $count = 1;
            }
            $redis->set($cachekey, serialize($count));
            $redis->expire($cachekey, 10);
        } else {
            $count = unserialize($redis->get($cachekey));
        }
    } catch (\Exception $ex) {
        //
    }
	return $count;
}