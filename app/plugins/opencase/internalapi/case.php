<?php

add_post('/api/nft/categories/', 'opencase_get_all_case_data_by_category');
add_post('/api/nft/box/([^\/]+)/', 'opencase_get_case_data');

function api_check_csrfcase() {
    if (!empty($csrfkey = $_SERVER['HTTP_X_CSRF_TOKEN'])) {
        if ($csrfkey == $_SESSION['csrftokenn']) {
            return;
        }
    }
    header_error(401);

    $json = ['success' => false, 'error' => 'Invalid request. Please try again'];
    echo_json($json);
}

function opencase_get_all_case_data_by_category() {
	$json = ['success' => false];
    if (rate_limit_check(getip(), 'gacdbc', 5, 5) == false) {
        api_check_csrfcase();
        $json['success'] = true;
        $caseInst = new ocase();
        $json['casesData'] = [];
        foreach (get_case_category() as $caseCategory) {
            $cases = $caseInst->get_ocases('enable = 1 AND type != 2 AND category = ' . $caseCategory->get_id(), 'position ASC');
            if (empty($cases)) {
                continue;
            }
            $casesData = [];
            foreach ($cases as $case) {
                if (!$case->is_available()) {
                    continue;
                }
                $casesData[] = [
                    'id' => $case->get_id(),
                    'name' => $case->get_name(),
                    'label' => $case->get_label(),
                    'type' => $case->get_type(),
                    'cssRarity' => $case->get_rarity_css(),
                    'key' => $case->get_key(),
                    'sale' => $case->get_total_sale(),
                    'price' => $case->get_price(),
                    'salePrice' => $case->get_sale_price(),
                    'availTime' => (!empty($case->get_time_limit()) ? ($case->get_time_limit() - time()) : false),
                    'caseImage' => $case->get_src_image(),
                    'itemImage' => $case->get_src_item_image(),
                ];
            }
            if (empty($casesData)) {
                continue;
            }
            $json['casesData'][] = [
                'id' => $caseCategory->get_id(),
                'name' => $caseCategory->get_name(),
                'cases' => $casesData
            ];
        }
        $isannounc = false;
        if (!empty(get_setval('opencase_announcement'))) {
            $isannounc = true;
        }
        if (get_setval('opencase_announcement') != "") {
            $isannounc = true;
        }
        $json['isannouncement'] = $isannounc;
        $json['announcement'] = get_setval('opencase_announcement');
    }
	echo_json($json);
}

function opencase_get_case_data($args) {
	$json = ['success' => false];
	$casenidd = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($casenidd) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $casenidd)) {
            if (rate_limit_check(getip(), 'gcasedata', 5, 5) == false) {
                api_check_csrfcase();
                $caseKey = safeescapestring(db()->nomysqlinj($casenidd));
                $case = new ocase();
                $case->load_from_key($caseKey);
                if ($case->get_id() != '') {
                    if (!$case->is_available()) {
                        $json['case'] = [
                            'enable' => false
                        ];
                    } else {
                        $countOpenPerPeriod = 0;
                        $sumDepPerPeriod = 0;
                        if (is_login()) {
                            $countOpenPerPeriod = get_count_case_per_period($case->get_id());
                            $sumDepPerPeriod = get_count_deposite_per_period();
                        }
                        $json['case'] = [
                            'enable' => true,
                            'id' => $case->get_id(),
                            'name' => $case->get_name(),
                            'label' => $case->get_label(),
                            'category' => $case->get_category(),
                            'description' => $case->get_description(),
                            'type' => $case->get_type(),
                            'key' => $case->get_key(),
                            'salePrice' => $case->get_sale_price(),
                            'finalPrice' => $case->get_final_price(),
                            'cssRarity' => $case->get_rarity_css(),
                            'availTime' => (!empty($case->get_time_limit()) ? ($case->get_time_limit() - time()) : false),
                            'caseImage' => $case->get_src_image(),
                            'allowOpen' => ($case->get_type() == ocase::TYPE_DEFAULT && $case->get_price() > 0) || ($case->get_type() == ocase::TYPE_DEPOSITE && can_open_free_case($case, $countOpenPerPeriod, $sumDepPerPeriod)) || ($case->get_type() == ocase::TYPE_PROMOCODE),
                            'openCount' => $case->get_open_count(),
                            'maxOpenCount' => $case->get_max_open_count() > 0 ? $case->get_max_open_count() : false,
                        ];
                        if ($case->get_type() == ocase::TYPE_DEFAULT) {
                            $json['case']['freeopen'] = [
                                'enable' => false,
                            ];
                        } elseif ($case->get_type() == ocase::TYPE_DEPOSITE) {
                            $timeBeforeOpen = 0;
                            if ($countOpenPerPeriod >= $case->get_dep_open_count()) {
                                $timeBeforeOpen = get_time_before_deposit_case_free_open($case->get_id());
                            }
                            $json['case']['deposit'] = [
                                'openedCount' => $countOpenPerPeriod,
                                'daySum' => $sumDepPerPeriod,
                                'minForOpen' => $case->get_dep_for_open(),
                                'possibleCount' => $case->get_dep_open_count(),
                                'checkDayCount' => get_setval('opencase_deposit_check_day'),
                                'timeBeforeOpen' => $timeBeforeOpen
                            ];
                        }
                    }
                    $json['items'] = [];
                    $item = new itemincase();

                    $redis = new Redis();
                    $redis->connect('127.0.0.1', 6379);

                    $cachekey = "itemincasesch".$case->get_id();

                    $items = '';

                    if (!$redis->get($cachekey)) {
                        $items = $item->get_itemincases('case_id = ' . $case->get_id(), 'position ASC, id ASC');
                        $redis->set($cachekey, serialize($items));
                        $redis->expire($cachekey, 7);
                    } else {
                        $items = unserialize($redis->get($cachekey));
                    }

                    $caseItems = [];
                    foreach ($items as $item) {
                        $caseItems[$item->get_item_class()->get_id()] = $item;
                    }
                    $currentitatp = 0;
                    $ticketcurrent = 1;
                    foreach ($caseItems as $item) {
                        if ($item->get_item_class()->get_status() == 0) {
                            if ($item->get_item_class()->get_network() == "sol") {
                                //replace that item with another or something
                            }
                        }
                        if ($item->get_item_class()->get_status() == 1) {
                            if ($item->get_item_class()->get_network() == "sol") {
                                //cache

                                $client = new GuzzleHttp\Client();
                                //usleep(1000000);
                                $request = $client->request('GET', 'api-mainnet.magiceden.dev/v2/tokens/' . $item->get_item_class()->get_mintaddress());

                                $response = @json_decode($request->getBody());
                                $stat = $request->getStatusCode();

                                //usleep(1000000);
                                $request2 = $client->request('GET', 'api-mainnet.magiceden.dev/v2/tokens/' . $item->get_item_class()->get_mintaddress() . '/listings/');

                                $response2 = @json_decode($request2->getBody());
                                $stat2 = $request2->getStatusCode();
                                $nftprice = 0;
                                foreach ($response2 as $re2) {
                                    $nftprice = $re2->price;
                                }


                                $request3 = $client->request('GET', 'api.coingecko.com/api/v3/coins/markets?vs_currency=eur&ids=solana');
                                $stat3 = $request3->getStatusCode();
                                $response3 = @json_decode($request3->getBody());
                                $solprice = 0;
                                $fetchedcurrprice = 0;
                                foreach ($response3 as $re3) {
                                    if (isset($re3->current_price)) {
                                        $solprice = $re3->current_price;
                                        $fetchedcurrprice = 1;
                                    }
                                }

                                if ($stat == 200 && $stat2 == 200 && $stat3 == 200) {

                                    $solnftprice = round(($nftprice * $solprice) * 1.02, 2);//+2%

                                    if ($fetchedcurrprice == 1) {
                                        if ($solnftprice > 0) {
                                            if (isset($response->name)) {
                                                if (isset($response->image)) {
                                                    $item->get_item_class()->set_name($response->name);
                                                    $imgrep1 = str_replace('https://arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/', $response->image);
                                                    $imgrep2 = str_replace('https://www.arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.arweave.net/', $imgrep1);
                                                    $imgrep3 = str_replace('https://ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/', $imgrep2);
                                                    $imgrep4 = str_replace('https://www.ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.ipfs.io/', $imgrep3);
                                                    $item->get_item_class()->set_image($imgrep4);
                                                    $item->get_item_class()->set_price($solnftprice);
                                                    $item->get_item_class()->set_status(1);
                                                    $item->get_item_class()->update_item();
                                                    $ticketfinish = ($ticketcurrent + ($item->get_chance() * 1000000)) - 1;
                                                    $json['items'][] = [
                                                        'name' => $response->name,
                                                        'image' => $imgrep4,
                                                        'chance' => $item->get_chance(),
                                                        'price' => $solnftprice,
                                                        'network' => $item->get_item_class()->get_network(),
                                                        'rarity' => $item->get_item_class()->get_css_quality_class(),
                                                        'quality' => $item->get_item_class()->get_quality(),
                                                        'ticketstart' => $ticketcurrent,
                                                        'ticketfinish' => $ticketfinish
                                                    ];
                                                    $ticketcurrent = $ticketfinish + 1;
                                                    $currentitatp += $solnftprice * $item->get_chance();
                                                }
                                            }
                                        }
                                        if ($solnftprice <= 0) {
                                            $item->get_item_class()->set_status(0);
                                            $item->get_item_class()->update_item();
                                        }
                                    }
                                }else{
                                    $json['success'] = false;
                                    $json['msg'] = 'rate limited by 3rd party';
                                    break;
                                }
                            }
                            if ($item->get_item_class()->get_network() == "site" || $item->get_item_class()->get_network() == "eth") {
                                $json['items'][] = [
                                    'name' => $item->get_item_class()->get_name_realname_no_quality(),
                                    'image' => $item->get_item_class()->get_image(),
                                    'chance' => $item->get_chance(),
                                    'price' => $item->get_price(),
                                    'network' => $item->get_item_class()->get_network(),
                                    'rarity' => $item->get_item_class()->get_css_quality_class(),
                                    'quality' => $item->get_item_class()->get_quality()
                                ];
                            }
                        }
                    }

                    $actualcaseprice = round($currentitatp/82, 2); //100-82 = 18% house edge
                    $json['case']['finalPrice'] = $actualcaseprice;
                    $json['case']['salePrice'] = $actualcaseprice;

                    $thiscase = new ocase($case->get_id());
                    $thiscase->set_price($actualcaseprice);
                    $thiscase->update_ocase();

                    if (is_login()) {
                        $json['nddx'] = user()->get_id();
                    }
                    $json['success'] = true;
                }
            }
        }
    }
	echo_json($json);
}