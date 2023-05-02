<?php

add_post('/api/web/', 'opencase_get_page_data');

function api_check_csrfpage() {
    if (!empty($csrfkey = $_SERVER['HTTP_X_CSRF_TOKEN'])) {
        if ($csrfkey == $_SESSION['csrftokenn']) {
            return;
        }
    }
    header_error(401);

    $json = ['success' => false, 'error' => 'Invalid request. Please try again'];
    echo_json($json);
}

function opencase_get_page_data() {
	$json = ['success' => false];
	if (!isset($_POST['url'])) {
		$json['error'] = 'No page indicated';
	} else {
	    $urlsdn = safeescapestring(strip_tags(trim($_POST['url'])));
        if(strlen($urlsdn) <= 200) {
            if (!preg_match('/[^a-zA-Z0-9]+/', $urlsdn)) {
                if (rate_limit_check(getip(), 'getpagedata', 5, 5) == false) {
                    api_check_csrfpage();
                    $redis = new Redis();
                    $redis->connect('127.0.0.1', 6379);

                    $cachekey = "getpagedata".safeescapestring(db()->nomysqlinj($urlsdn));

                    $webpage = '';

                    if (!$redis->get($cachekey)) {
                        $webpage = selo('webpage', ['url' => safeescapestring(db()->nomysqlinj($urlsdn))], ['namepage' => 'DESC']);
                        $redis->set($cachekey, serialize($webpage));
                        $redis->expire($cachekey, 10);
                    } else {
                        $webpage = unserialize($redis->get($cachekey));
                    }


                    if (empty($webpage)) {
                        $json['error'] = 'Page not found';
                    } else {
                        $json['success'] = true;
                        $json['page'] = [
                            'title' => $webpage['title'],
                            'pageTitle' => $webpage['title_page'],
                            'metaDes' => $webpage['meta_des'],
                            'metKey' => $webpage['meta_key'],
                            'content' => $webpage['content'],
                        ];
                    }
                }
            }
        }
	}
	echo_json($json);
}
