<?php
use kornrunner\Keccak;
use Elliptic\EC;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;
use Mailgun\Mailgun;

add_post('/api/request/sell/([0-9]+)/', 'opencase_sale');
add_post('/api/request/getnft/([0-9]+)/', 'opencase_withdraw');
add_post('/api/request/openbox/([0-9]+)/', 'opencase_open');
add_post('/api/request/setethwallet/', 'opencase_save_ethwallet');
//add_post('/api/request/setsolwallet/', 'opencase_save_solwallet');
add_post('/api/request/statistics/', 'opencase_getstat');
add_post('/api/request/lastnfts/', 'opencase_getnewdrop');
add_post('/api/request/nftsuser/', 'opencase_getuserdrops');
//add_post('/api/request/promo/', 'opencase_usepromocode');
add_post('/api/request/openbox/nft/([0-9]+)/', 'opencase_multiply_open');
add_post('/api/request/chat/send/', 'opencase_chat_send');
add_post('/api/request/chat/info/', 'opencase_getchat_last');
add_post('/api/request/chat/moddelete/', 'opencase_chat_delete');
add_post('/api/request/chat/modchatban/', 'opencase_chat_ban');
add_post('/api/request/referrals/get/', 'opencase_get_referrals');
add_post('/api/request/refcode/set/', 'opencase_set_refcode');
add_post('/api/request/verifysig/', 'opencase_verify_sig');
add_post('/api/request/getnonce/', 'opencase_get_nonce');
add_post('/api/request/setusername/', 'opencase_set_username');
add_post('/api/request/verifygauth/', 'opencase_verify_googleauth');
add_post('/api/request/userefcode/', 'opencase_userefcode');
add_post('/api/request/setpassword/', 'opencase_set_newpassword');
add_post('/api/request/changeseed/', 'opencase_change_seed');
add_post('/api/request/uploadavatar/', 'opencase_upload_avatar');
add_post('/api/request/fwbhk329812ba13291k/', 'opencase_finger_webhook');
add_post('/api/request/raintakepartin/', 'opencase_takepartinrain');
add_post('/api/request/getcrfees/', 'opencase_getfees');
add_post('/api/request/depoprcs/', 'opencase_depositfull');
add_post('/api/request/ipncallb2u54wnnb1jmcfz/', 'opencase_ipn_callback');
add_post('/api/request/testnf/', 'opencase_testcollections');
add_post('/api/request/getcountrexcr/', 'opencase_getcountrexcr');
add_post('/api/request/exchangenft/', 'opencase_exchangecr');
add_post('/api/request/selltohistory/', 'opencase_selltohistory');
add_post('/api/request/nftwivlist/', 'opencase_nftwithdlist');
add_post('/api/request/openedcases/', 'opencase_get_user_opendcasesdrop');
add_post('/api/request/depohistory/', 'opencase_depositusrhistory');
add_post('/api/request/resendemailconf/', 'opencase_resendemailconf');
add_post('/api/request/confirmemail/', 'opencase_confirmemail'); 

add_post('/api/request/getnftindex/', 'opencase_getnft');
add_post('/api/request/fairverify/', 'opencase_verify');
add_post('/api/request/initload/', 'fetchNftList');

function opencase_getnft() {
    $request_json = file_get_contents('php://input');
    $request = @json_decode($request_json, true);
    $clientseed = $request['clientseed'];
    $boxindex = $request['boxindex'];

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379); 
    
    $nounce_key = "nounce".$boxindex;
    $seed_key = "seed".$boxindex;

    $nonce = unserialize($redis->get($nounce_key));
    $server_seed = unserialize($redis->get($seed_key));

    // refresh the server seed per 100 rounds
    if(empty($nonce) || fmod($nonce,100) == 0){
        $server_seed = bin2hex(random_bytes(32));
        $redis->set($seed_key, serialize($server_seed));    
        if(empty($nonce)){
            $nonce = 0;
        } 
    }
    $nonce++;
    $redis->set($nounce_key, serialize($nonce));

    // generate the nft array index and use it for return value later
    $index = generateNftIndex($clientseed, $server_seed, $nonce); 
    $json = ['success' => true, 'index' => $index];
    echo_json($json);
}

function opencase_verify(){
    $request_json = file_get_contents('php://input');
    $request = @json_decode($request_json, true);
    $clientseed = $request['clientseed'];
    $serverseed = $request['serverseed'];
    $nonce = $request['nonce'];
    $index = generateNftIndex($clientseed, $serverseed, $nonce); 
    $json = ['success' => true, 'index' => $index];
    echo_json($json);
}

function generateNftIndex($clientSeed, $serverSeed, $nonce){
    // Generate the hash numbe by using hardware hmac
    $hmac = hash_hmac('sha256', "$clientSeed:$nonce",   $serverSeed);        
    // Convert the HMAC output to a decimal number between 0 and 1
    $hex = substr($hmac, 0, 13);
    $decimal = hexdec($hex) / (pow(2, 52) - 1); 
    // generate 0~1000 as index
    return floor(fmod($decimal * 1000, 1000));  
}

function fetchNftList(){
    
}




function api_check_csrf() {
    if (!empty($csrfkey = $_SERVER['HTTP_X_CSRF_TOKEN'])) {
            if ($csrfkey == $_SESSION['csrftokenn']) {
                return;
            }
    }
    header_error(401);

    $json = ['success' => false, 'error' => 'Invalid request. Please try again'];
    echo_json($json);
}

function opencase_ipn_callback(){
    $json = ['success' => false];
    $request_data = null;
        if (isset($_SERVER['HTTP_X_NOWPAYMENTS_SIG']) && !empty($_SERVER['HTTP_X_NOWPAYMENTS_SIG'])) {
            $recived_hmac = $_SERVER['HTTP_X_NOWPAYMENTS_SIG'];
            $request_json = file_get_contents('php://input');
            $request_data = @json_decode($request_json, true);
            ksort($request_data);
            $sorted_request_json = json_encode($request_data);
            if ($request_json !== false && !empty($request_json)) {
                $hmac = hash_hmac("sha512", $sorted_request_json, trim("iyvR/HpOqIKgrLjJQQmcAwOGh+xKEg0k"));
                if ($hmac == $recived_hmac) {
                    if (safeescapestring(db()->nomysqlinj($request_data['payment_status'])) == "finished") {
                        db()->query_once('update opencase_deposite set `status` = 1 where id = "' . safeescapestring(db()->nomysqlinj($request_data['order_id'])) . '"');
                        $dataoded = db()->query_once('SELECT * FROM opencase_deposite WHERE id = "' . safeescapestring(db()->nomysqlinj($request_data['order_id'])) . '" LIMIT 1');
                        if (!empty($dataoded)) {
                            $useridoded = $dataoded['user_id'];
                            $baltoaddoded = $dataoded['sum'];
                            $pmethododed = $dataoded['num'];
                            $useroded = new user($useridoded);

                            if ($useroded->get_id() != ''){
                                inc_user_balance($useroded, $baltoaddoded);
                                add_balance_log($useroded->get_id(), $baltoaddoded, 'Deposit using '.$pmethododed. ' deposit id '.safeescapestring(db()->nomysqlinj($request_data['order_id'])), 0);
                            }

                            centrifugo::messageSystem($dataoded['user_id'], "Your deposit has been processed!", "", "success");

                            if (!empty($useroded->get_data('used_ref_code'))) {
                                $dataoded2 = db()->query_once('SELECT * FROM users_data WHERE user_field_id = 19 AND value = "' . ($useroded->get_data('used_ref_code')) . '" LIMIT 1');
                                if (!empty($dataoded2)) {
                                    $userodedref = new user($dataoded2['user_id']);
                                    $refbaltoadd = round($baltoaddoded * 0.02, 2);

                                    inc_user_balance($userodedref, $refbaltoadd);
                                    add_balance_log($useroded->get_id(), $baltoaddoded, 'Referral deposit from user '.$useridoded.' deposit id '.safeescapestring(db()->nomysqlinj($request_data['order_id'])), 4);

                                    $dataorefxk = db()->query_once('SELECT * FROM referral_user WHERE referrer_id = "' . safeescapestring(db()->nomysqlinj($dataoded2['user_id'])) . '" AND referral_id = "' . safeescapestring(db()->nomysqlinj($dataoded['user_id'])) . '" LIMIT 1');
                                    if (!empty($dataorefxk)) {
                                        $newlogprf = floatval($dataorefxk['profit'] + $refbaltoadd);
                                        db()->query_once('update referral_user set `profit` = ' . safeescapestring(db()->nomysqlinj($newlogprf)) . ' where id = "' . safeescapestring(db()->nomysqlinj($dataorefxk['id'])) . '"');
                                    }
                                }
                            }

                            $json = ['success' => true, 'msg' => 'Balance added. Success ipn callback.'];
                        }


                    }
                } else {
                    $json = ['success' => false, 'msg' => 'HMAC signature does not match'];
                }
            } else {
                $json = ['success' => false, 'msg' => 'Error reading POST data'];
            }
        } else {
            $json = ['success' => false, 'msg' => 'No HMAC signature sent'];
        }
    echo_json($json);
}

function opencase_takepartinrain()
{
    $json = ['success' => false];

    if (empty($_POST['recaptch_rain_resp'])) {
        $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
    }else {
        $json = ['success' => false];
        $user = user();
        if ($user->get_id() != '' && $user->is_login()) {
            if (rate_limit_check(getip(), 'takepartinrain', 1, 5) == false) {
                api_check_csrf();

                $recaptcharesponse = ($_POST['recaptch_rain_resp']);

                $recaptcha = new \ReCaptcha\ReCaptcha("6Ldp-NcfAAAAALHExY7k-DgjbIX03v0xVZOUp7xW");
                $resprecaptcha = $recaptcha->setExpectedHostname('smirnoffonbahamas.vip')
                    ->verify($recaptcharesponse, getip());
                if ($resprecaptcha->isSuccess()) {
                    $checkifisrain = db()->query_once('select * from rain where status = 1 ORDER BY id DESC LIMIT 1');
                    if (!is_null($checkifisrain)) {
                        $take_part_in_this_rain = db()->query_once('select * from rainlog where userid = "' . $user->get_id() . '" and rainid = "' . $checkifisrain['id'] . '"');
                        if (is_null($take_part_in_this_rain)) {
                            $usertotaldepo_last4days = db()->query_once('select SUM(sum) AS sumdep from opencase_deposite where user_id = "' . safeescapestring(db()->nomysqlinj(user()->get_id())) . '" AND status = 1 AND time_add >= NOW() - INTERVAL 5 DAY');
                            if ($usertotaldepo_last4days['sumdep'] < 5 && $user->get_firstrain() == 1) {
                                $json = ['success' => false, 'error' => 'Your rains have drained out. To take part in rain you need to deposit at least $5 in last 5 days.'];
                            } else {
                                $rainlog = new rainlog();
                                $rainlog->set_rainid($checkifisrain['id']);
                                $rainlog->set_userid($user->get_id());
                                $rainlog->set_amount(0);
                                $rainlog->add_rainlog();
                                $json = ['success' => true, 'msg' => 'You have joined rain'];
                            }
                        } else {
                            $json = ['success' => false, 'error' => 'You already joined this rain'];
                        }
                    } else {
                        $json = ['success' => false, 'error' => 'There is no active rain at this moment'];
                    }
                } else {
                    $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
                }
            } else {
                $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
            }
        } else {
            $json = ['success' => false, 'error' => 'You are not logged in'];
        }
    }
    echo_json($json);
}

function opencase_getcountrexcr(){
    $json = ['success' => false];
    $user = user();
    if ($user->get_id() != '' && $user->is_login()) {
        if (rate_limit_check(getip(), 'getcountrexcr', 2, 5) == false) {
            api_check_csrf();
            $client = new GuzzleHttp\Client();

            $request = $client->request('GET', 'iplocate.io/api/lookup/'.getip());
            $stat = $request->getStatusCode();
            if ($stat == 200 || $stat == "200") {
                $response = @json_decode($request->getBody());
                $json = ['success' => true, 'country' => $response->country_code];
            }else{
                $json = ['success' => false, 'error' => 'Error. Please try again'];
            }
        }else{
            $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
        }
    }else{
        $json = ['success' => false, 'error' => 'You are not logged in'];
    }
    echo_json($json);
}

function opencase_exchangecr(){
    $json = ['success' => false];
    if (isset($_POST['address']) && $_POST['address'] != '') {
        if(!empty($_POST['address'])) {
            if (isset($_POST['nftid']) && $_POST['nftid'] != '') {
                if(!empty($_POST['nftid'])) {
                    if (isset($_POST['method']) && $_POST['method'] != '') {
                        if (!empty($_POST['method'])) {
                                $waddress = safeescapestring(strip_tags(trim($_POST['address'])));
                                $wmethod = safeescapestring(strip_tags(trim($_POST['method'])));
                                $wnftid = safeescapestring(strip_tags(trim($_POST['nftid'])));
                                if (is_numeric($wnftid)) {
                                if ($wmethod == "eth") {
                                    if (!preg_match('/[^a-zA-Z0-9]+/', $waddress)) {
                                        if (strlen($waddress) >= 22 && strlen($waddress) <= 45) {
                                            if (!empty($waddress) && !empty($wmethod) && !empty($wnftid)) {
                                                $wnftid = intval($wnftid);
                                                if ($wnftid >= 1 && $wnftid <= 500000000000000000) {
                                                    $user = user();
                                                    if ($user->get_id() != '' && $user->is_login()) {
                                                        if (rate_limit_check(getip(), 'exchangecr', 1, 5) == false) {
                                                            api_check_csrf();
                                                            $userloggexfh = user();
                                                            if (!is_locked_user($userloggexfh)) {
                                                                lock_user($userloggexfh);
                                                                $droppedItem = new droppedItem(safeescapestring(strip_tags(trim($wnftid))));
                                                                if ($droppedItem->get_user_id() == $userloggexfh->get_id()) {
                                                                    if ($droppedItem->get_status() == 0 || $droppedItem->get_status() == 6) {
                                                                        if (get_setval('opencase_enablewithdrawcrypt') == 1) {
                                                                            $client = new GuzzleHttp\Client();
                                                                            $request = $client->request('GET', 'iplocate.io/api/lookup/' . getip());
                                                                            $stat = $request->getStatusCode();
                                                                            if ($stat == 200 || $stat == "200") {
                                                                                $response = @json_decode($request->getBody());
                                                                                if ($response->country_code == "USXXXDISABLED") { //remove XXXDISABLED
                                                                                    $json = ['success' => false, 'error' => 'Exchange is not available in your country. If you are using VPN, please disable it.'];
                                                                                } else {
                                                                                    $client2 = new GuzzleHttp\Client();
                                                                                    $redis = new Redis();
                                                                                    $redis->connect('127.0.0.1', 6379);
                                                                                    $cachekey = "ethfeecr";
                                                                                    $response2 = '';
                                                                                    $stat2 = 0;
                                                                                    if (!$redis->get($cachekey)) {
                                                                                        $request2 = $client2->request('GET', 'owlracle.info/eth/gas');
                                                                                        $stat2 = $request2->getStatusCode();
                                                                                        if ($stat2 == 200 || $stat2 == "200") {
                                                                                            $response2 = @json_decode($request2->getBody());
                                                                                            $redis->set($cachekey, serialize($response2));
                                                                                            $redis->expire($cachekey, 25);
                                                                                        }else{
                                                                                            $json = ['success' => false, 'error' => 'Error with getting fees. Please try again'];
                                                                                        }
                                                                                    } else {
                                                                                        $response2 = unserialize($redis->get($cachekey));
                                                                                        $stat2 = 200;
                                                                                    }
                                                                                    if ($stat2 == 200) {
                                                                                        db()->query_once('UPDATE `opencase_droppeditems` SET `status` = 4 WHERE `id` = "' . safeescapestring(db()->nomysqlinj($wnftid)) . '";');
                                                                                        add_balance_log($user->get_id(), 0, 'NFT dItem' . safeescapestring(db()->nomysqlinj($wnftid)) . ' Sell for Crypto Address' . $waddress . ' (' . $wmethod . ')', 1);

                                                                                        $percentitmfee = round($droppedItem->get_price() * 0.015, 2);
                                                                                        $ethcurrntfee = round($response2->speeds[3]->estimatedFee, 2);
                                                                                        $totalnftfeeeth = $percentitmfee+$ethcurrntfee;

                                                                                        $cryptocr = new cryptowithdrawals();
                                                                                        $cryptocr->set_userid(user()->get_id());
                                                                                        $cryptocr->set_amount($droppedItem->get_price());
                                                                                        $cryptocr->set_fee($totalnftfeeeth);
                                                                                        $cryptocr->set_droppednft(safeescapestring(db()->nomysqlinj($wnftid)));
                                                                                        $cryptocr->set_address($waddress);
                                                                                        $cryptocr->set_method($wmethod);
                                                                                        $cryptocr->set_status(1);
                                                                                        $cryptocr->add_crypto_withdrawal();
                                                                                        $json['success'] = true;
                                                                                        $json['msg'] = 'Success NFT exchange, will be processed soon';
                                                                                        $redisv = new Redis();
                                                                                        $redisv->connect('127.0.0.1', 6379);
                                                                                        $cachekey = "getusedich".$userloggexfh->get_publicid()."0"."18";
                                                                                        $cachekey2 = "getusedich".$userloggexfh->get_publicid()."1"."18";
                                                                                        $cachekey3 = "getusedich".$userloggexfh->get_publicid()."2"."18";
                                                                                        $cachekey4 = "getusedich".$userloggexfh->get_publicid()."3"."18";
                                                                                        $cachekey5 = "getusedich".$userloggexfh->get_publicid()."4"."18";
                                                                                        $cachekey6 = "getusedich".$userloggexfh->get_publicid()."5"."18";
                                                                                        $cachekey7 = "getusedich".$userloggexfh->get_publicid()."6"."18";
                                                                                        $cachekey8 = "getusedich".$userloggexfh->get_publicid()."7"."18";
                                                                                        $cachekey9 = "getusedich".$userloggexfh->get_publicid()."8"."18";
                                                                                        $cachekey10 = "getusedich".$userloggexfh->get_publicid()."9"."18";
                                                                                        $cachekey11 = "getusedich".$userloggexfh->get_publicid()."10"."18";
                                                                                        $cachekey12 = "droppeditemload".$droppedItem->get_id();
                                                                                        $redisv->del($cachekey);
                                                                                        $redisv->del($cachekey2);
                                                                                        $redisv->del($cachekey3);
                                                                                        $redisv->del($cachekey4);
                                                                                        $redisv->del($cachekey5);
                                                                                        $redisv->del($cachekey6);
                                                                                        $redisv->del($cachekey7);
                                                                                        $redisv->del($cachekey8);
                                                                                        $redisv->del($cachekey9);
                                                                                        $redisv->del($cachekey10);
                                                                                        $redisv->del($cachekey11);
                                                                                        $redisv->del($cachekey12);
                                                                                    } else {
                                                                                        $json = ['success' => false, 'error' => 'Error with getting fees. Please try again'];
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                $json = ['success' => false, 'error' => 'Error. Please try again'];
                                                                            }
                                                                        } else {
                                                                            $json = ['success' => false, 'error' => 'NFT Exchanges are currently in maintenance mode. Please try again later.'];
                                                                        }
                                                                    }else{
                                                                        $json = ['success' => false, 'error' => 'This NFT has already been sold or withdrawn'];
                                                                    }
                                                                } else {
                                                                    $json = ['success' => false, 'error' => 'Invalid request, you dont own this NFT'];
                                                                }
                                                                unlock_user($userloggexfh);
                                                            } else {
                                                                $json = ['success' => false, 'error' => 'You cannot perform this action because another action is currently in progress'];
                                                            }
                                                        } else {
                                                            $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                                                        }
                                                    } else {
                                                        $json = ['success' => false, 'error' => 'You are not logged in'];
                                                    }
                                                }else{
                                                    $json = ['success' => false, 'error' => 'Minimum exchange is 5 EUR'];
                                                }
                                            } else {
                                                $json = ['success' => false, 'error' => 'Invalid address or NFT ID, please try again'];
                                            }
                                        } else {
                                            $json = ['success' => false, 'error' => 'Invalid address'];
                                        }
                                    } else {
                                        $json = ['success' => false, 'error' => 'Invalid address'];
                                    }
                                } else {
                                    $json = ['success' => false, 'error' => 'Invalid method'];
                                }
                            }else{
                                    $json = ['success' => false, 'error' => 'Invalid NFT ID, please try again'];
                            }
                        } else {
                            $json = ['success' => false, 'error' => 'Invalid method'];
                        }
                    } else {
                        $json = ['success' => false, 'error' => 'Invalid method'];
                    }
                }else{
                    $json = ['success' => false, 'error' => 'Invalid NFT ID, please try again'];
                }
            }else{
                $json = ['success' => false, 'error' => 'Invalid NFT ID, please try again'];
            }
        }else{
            $json = ['success' => false, 'error' => 'Invalid address'];
        }
    }else{
        $json = ['success' => false, 'error' => 'Invalid address'];
    }
    echo_json($json);
}

function opencase_depositfull(){
    $json = ['success' => false];
    $user = user();

    if (isset($_POST['depmethodrq']) && $_POST['depmethodrq'] != '') {
        $depmethodr = safeescapestring(strip_tags(trim($_POST['depmethodrq'])));
        if ($depmethodr == "btc" || $depmethodr == "eth" || $depmethodr == "xrp" || $depmethodr == "ltc" || $depmethodr == "doge" || $depmethodr == "bch" || $depmethodr == "dash" || $depmethodr == "sol" || $depmethodr == "ada" || $depmethodr == "shib" || $depmethodr == "trx" || $depmethodr == "atom" || $depmethodr == "matic" || $depmethodr == "bnbbsc" || $depmethodr == "link" || $depmethodr == "dot") {
            if (isset($_POST['amountdrq']) && $_POST['amountdrq'] != '') {
                if ($user->get_id() != '' && $user->is_login()) {
                    if (rate_limit_check(getip(), 'deporequestusr', 5, 5) == false) {
                        api_check_csrf();
                        $userloggexfhdt = user();
                        if (!is_locked_user($userloggexfhdt)) {
                            lock_user($userloggexfhdt);

                            $amountdrq = safeescapestring(strip_tags(trim($_POST['amountdrq'])));

                            if (is_numeric($amountdrq)) {
                                if (!empty($amountdrq)) {
                                    $amountdrq = round($amountdrq, 2);
                                    if ($amountdrq >= 5 && $amountdrq <= 80000) {

                                        db()->query_once('insert into opencase_deposite( `user_id`, `sum`, `num`, `from`, `status`) values ( "'.safeescapestring(db()->nomysqlinj($userloggexfhdt->get_id())).'", "'.safeescapestring(db()->nomysqlinj($amountdrq)).'", "'.safeescapestring(db()->nomysqlinj($depmethodr)).'", 1, 0 )');

                                        $amountdrq = round($amountdrq * 1.01, 2); //add 1% fee
                                        $depositdata = '{
                                          "price_amount": '.$amountdrq.',
                                          "price_currency": "eur",
                                          "pay_currency": "'.$depmethodr.'",
                                          "order_id": "'.(db()->get_last_id()).'",
                                          "order_description": "deposiv",
                                          "ipn_callback_url":"https://smirnoffonbahamas.vip/api/request/ipncallb2u54wnnb1jmcfz/",
                                          "case": "success"
                                        }';

                                        $url = "https://api-sandbox.nowpayments.io/v1/payment";
                                        $client = new GuzzleHttp\Client();
                                        $response = $client->post($url, [
                                            'headers' => ['Content-Type' => 'application/json', 'x-api-key' => '5ZK67TC-GQZ4VEV-QKRE29T-0MTS7A8'],
                                            'body' => $depositdata
                                        ]);
                                        $stat = $response->getStatusCode();
                                        if ($stat == 201 || $stat == "201") {
                                            $responser = @json_decode($response->getBody());
                                            if ($responser->pay_currency == "btc" || $responser->pay_currency == "eth" || $responser->pay_currency == "xrp" || $responser->pay_currency == "ltc" || $responser->pay_currency == "doge" || $responser->pay_currency == "bch" || $responser->pay_currency == "dash" || $responser->pay_currency == "sol" || $responser->pay_currency == "ada" || $responser->pay_currency == "shib" || $responser->pay_currency == "trx" || $responser->pay_currency == "atom" || $responser->pay_currency == "matic" || $responser->pay_currency == "bnbbsc" || $responser->pay_currency == "link" || $responser->pay_currency == "dot") {
                                                $json['amnt'] = $responser->pay_amount;
                                                $json['adrsn'] = $responser->pay_address;
                                                $json['mthd'] = $responser->pay_currency;
                                                $json['success'] = true;
                                            }else{
                                                $json = ['success' => false, 'error' => 'Error. Please try again'];
                                            }
                                        }else{
                                            $json = ['success' => false, 'error' => 'Error. Please try again'];
                                        }
                                    }else{
                                        $json = ['success' => false, 'error' => 'Invalid deposit amount, minimum is 5€'];
                                    }
                                }else{
                                    $json = ['success' => false, 'error' => 'Invalid deposit amount'];
                                }
                            }else{
                                $json = ['success' => false, 'error' => 'Invalid deposit amount'];
                            }
                            unlock_user($userloggexfhdt);
                        } else {
                            $json = ['success' => false, 'error' => 'Another action is currently in process, please try again'];
                        }
                    } else {
                        $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                    }
                } else {
                    $json = ['success' => false, 'error' => 'You are not logged in'];
                }
            } else {
                $json = ['success' => false, 'error' => 'Invalid deposit amount'];
            }
        }else{
            $json = ['success' => false, 'error' => 'Invalid deposit method'];
        }
    }else{
        $json = ['success' => false, 'error' => 'Invalid deposit method'];
    }
    echo_json($json);
}

function opencase_upload_avatar(){
    $json = ['success' => false];
    $user = user();
    if (isset($_FILES['file'])) {
        if ($user->get_id() != '' && $user->is_login()) {
            if (rate_limit_check(getip(), 'uploadavatarrt', 1, 40) == false) {
                api_check_csrf();
                $userloggexfh = user();
                if (!is_locked_user($userloggexfh)) {
                    lock_user($userloggexfh);

                    $userupldav = new user(user()->get_id());
                    $userexpdav = 1;
                    $useravatarban = 1;

                    if ($userupldav->get_id() != '') {
                        $userexpdav = $userupldav->get_data('exp');
                        $useravatarban = $userupldav->get_data('avatar_ban');
                    }

                    if ($useravatarban == 0) {

                        $lvlusrcav = ((pow($userexpdav / 1000, 1 / 2)) + 1);

                        if ($lvlusrcav > 2) {

                            $filepath = $_FILES['file']['tmp_name'];
                            $fileSize = filesize($filepath);
                            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
                            $filetype = finfo_file($fileinfo, $filepath);

                            if ($fileSize === 0) {
                                $json = ['success' => false, 'error' => 'Error. Please try again'];
                            } else {
                                if ($fileSize < 3145728) {

                                    $allowedTypes = [
                                        'image/png' => 'png',
                                        'image/jpeg' => 'jpg'
                                    ];

                                    if (!in_array($filetype, array_keys($allowedTypes))) {
                                        $json = ['success' => false, 'error' => 'Avatar not allowed. Only png and jpg are accepted'];
                                    } else {

                                        $newavatarname = bin2hex(random_bytes(12));

                                        list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
                                        $target_filename = $_FILES['file']['tmp_name'];
                                        $fn = $_FILES['file']['tmp_name'];
                                        $size = getimagesize($fn);
                                        $width = 150;
                                        $height = 150;
                                        $src = imagecreatefromstring(file_get_contents($fn));
                                        $dst = imagecreatetruecolor($width, $height);
                                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

                                        imagejpeg($dst, $target_filename);
                                        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $newavatarname . '.jpg');

                                        $userloggexfh->upd_data('image', 'https://smirnoffonbahamas.vip/uploads/' . $newavatarname . '.jpg');
                                        $json = ['success' => true, 'nvimgav' => 'https://smirnoffonbahamas.vip/uploads/' . $newavatarname . '.jpg', 'msg' => "Avatar has been changed"];
                                    }
                                } else {
                                    $json = ['success' => false, 'error' => 'Avatar is too big. Max size 3MB'];
                                }
                            }
                        } else {
                            $json = ['success' => false, 'error' => 'To change avatar you need to be level 2'];
                        }
                    }else{
                        $json = ['success' => false, 'error' => "You can't change avatar. Please contact support"];
                    }
                    unlock_user($userloggexfh);
                } else {
                    $json = ['success' => false, 'error' => 'You cannot perform this action because another action is currently in progress'];
                }
            } else {
                $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
            }
        } else {
            $json = ['success' => false, 'error' => 'You are not logged in'];
        }
    }else{
        $json = ['success' => false, 'error' => 'Please choose image to upload avatar'];
    }
    echo_json($json);
}

function opencase_getfees(){
    $json = ['success' => false];
    $user = user();
        if ($user->get_id() != '' && $user->is_login()) {
            if (rate_limit_check(getip(), 'getfeescr', 3, 5) == false) {
                api_check_csrf();

                    $client = new GuzzleHttp\Client();

                    $redis = new Redis();
                    $redis->connect('127.0.0.1', 6379);

                    $cachekey = "ethfeecr";

                    $response = '';
                    $stat = 0;
                    if (!$redis->get($cachekey)) {
                        $request = $client->request('GET', 'owlracle.info/eth/gas');
                        $stat = $request->getStatusCode();
                        if ($stat == 200 || $stat == "200"){
                            $response = @json_decode($request->getBody());
                            $redis->set($cachekey, serialize($response));
                            $redis->expire($cachekey, 25);
                        }else{
                            $json = ['success' => false, 'error' => 'Error with getting ETH fees. Please try again later'];
                        }
                    } else {
                        $response = unserialize($redis->get($cachekey));
                        $stat = 200;
                    }
                    if ($stat == 200) {
                        $json['success'] = true;
                        $json['ethfeeprice'] = round($response->speeds[3]->estimatedFee, 2);
                    } else {
                        $json = ['success' => false, 'error' => 'Error with getting ETH fees. Please try again later'];
                    }

            } else {
                $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
            }
        } else {
            $json = ['success' => false, 'error' => 'You are not logged in'];
        }
    echo_json($json);
}

function opencase_testcollections(){
    $json = ['success' => false];
    if (rate_limit_check(getip(), 'testcollections', 3, 5) == false) {
        api_check_csrf();

        /*
        $client = new GuzzleHttp\Client();
        $promise = $client->requestAsync('GET', 'http://httpbin.org/get');
        $promise->then(
            function (ResponseInterface $res) {
                $json['statuscode'] = $res->getStatusCode();
            },
            function (RequestException $e) {
                $json['err'] = $e->getMessage();
            }
        );
        */
        $collectionname = 'edgn';

        $client = new GuzzleHttp\Client();

        $request2 = $client->request('GET', 'api.coingecko.com/api/v3/coins/markets?vs_currency=eur&ids=solana');
        $stat2 = $request2->getStatusCode();
        $response2 = @json_decode($request2->getBody());
        foreach ($response2 as $re2) {
            $json['solprice'] = $re2->current_price;
        }

        //usleep(500000);
        $request3 = $client->request('GET', 'api.coingecko.com/api/v3/coins/markets?vs_currency=eur&ids=ethereum');
        $stat3 = $request3->getStatusCode();
        $response3 = @json_decode($request3->getBody());
        foreach ($response3 as $re3) {
            $json['ethprice'] = $re3->current_price;
        }

        $request4 = $client->request('GET', 'owlracle.info/eth/gas');
        $stat4 = $request4->getStatusCode();
        if ($stat4 == 200 || $stat4 == "200") {
            $response4 = @json_decode($request4->getBody());
            $json['ethavggas'] = $response4->avgGas;
            $json['ethgasprice'] = $response4->speeds[3]->gasPrice;

            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $cachekey = "maelistingch" . $collectionname;

            $response = '';
            if (!$redis->get($cachekey)) {
                //usleep(500000);
                $request = $client->request('GET', 'api-mainnet.magiceden.dev/v2/collections/' . $collectionname . '/listings?offset=0&limit=20');
                $stat = $request->getStatusCode();
                $response = @json_decode($request->getBody());
                $redis->set($cachekey, serialize($response));
                $redis->expire($cachekey, 30);
            } else {
                $response = unserialize($redis->get($cachekey));
                $stat = 200;
            }
            foreach ($response as $re) {
                $pricenftinusd = round(($re->price * $json['solprice']) * 1.02, 2);//+2%
                if ($pricenftinusd >= 3 && $pricenftinusd <= 100) {
                    $json['achouse1'] = $re->auctionHouse;
                    $json['tokenmint1'] = $re->tokenMint;
                    $json['priceinusd1'] = $pricenftinusd;
                    $imgrep1 = str_replace('https://arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/', $re->extra->img);
                    $imgrep2 = str_replace('https://www.arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.arweave.net/', $imgrep1);
                    $imgrep3 = str_replace('https://ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/', $imgrep2);
                    $imgrep4 = str_replace('https://www.ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.ipfs.io/', $imgrep3);
                    $json['nftimg1'] = $imgrep4;
                }
            }


            $json['response'] = $response;
            $json['stat'] = $stat;
            $json['stat2'] = $stat2;
            $json['stat3'] = $stat3;
            $json['stat4'] = $stat4;
            $json['success'] = true;
        }else{
            $json['msg'] = "Error with getting gas fee, try again";
            $json['false'] = true;
        }
    }
    echo_json($json);
}

function opencase_finger_webhook(){
    $json = ['success' => "maybe"];
    $fgc = file_get_contents("php://input");
    $decdata = (@json_decode($fgc, true));
    $reqid = safeescapestring(strip_tags(trim($decdata['requestId'])));
    $visitorid = safeescapestring(strip_tags(trim($decdata['visitorId'])));
    $linkedid = safeescapestring(strip_tags(trim($decdata['linkedId'])));
    if (!empty($reqid) && !empty($visitorid) && !empty($linkedid)){
        $datafing = db()->query_once('SELECT * FROM fingerprints WHERE fingerprint = "' . safeescapestring(db()->nomysqlinj($visitorid)) . '"');
        if (empty($datafing)) {
            $datafing2 = db()->query_once('SELECT * FROM fingerprints WHERE userid = "' . safeescapestring(db()->nomysqlinj($linkedid)) . '"');
            if (empty($datafing2)){
                db()->query_once('insert into fingerprints( `fingerprint`, `userid`, `caseopened`) values ( "'.safeescapestring(db()->nomysqlinj($visitorid)).'", "'.safeescapestring(db()->nomysqlinj($linkedid)).'", 0 )');
            }
        }
    }
    echo_json($json);
}

function opencase_change_seed() {
    $json = ['success' => false];
    $user = user();
    if ($user->get_id() != '' && $user->is_login()) {
        if (!empty($_POST['recaptch_seed_resp'])) {
            $recaptcharesponse = ($_POST['recaptch_seed_resp']);
            if (rate_limit_check(getip(), 'changeseed', 1, 5) == false) {
                api_check_csrf();
                $recaptcha = new \ReCaptcha\ReCaptcha("6Ldp-NcfAAAAALHExY7k-DgjbIX03v0xVZOUp7xW");
                $resprecaptcha = $recaptcha->setExpectedHostname('smirnoffonbahamas.vip')
                    ->verify($recaptcharesponse, getip());
                if ($resprecaptcha->isSuccess()) {
                    if (!is_locked_user($user)) {
                        lock_user($user);
                        if (isset($_POST['new_seed']) && $_POST['new_seed'] != '') {
                            $newseed = safeescapestring(strip_tags(trim(db()->nomysqlinj($_POST['new_seed']))));
                            if (!preg_match('/[^a-zA-Z0-9]+/', $newseed)) {
                                if (strlen($newseed) >= 3) {
                                    if (strlen($newseed) <= 26) {
                                        add_balance_log($user->get_id(), 0, 'Change seed new seed:' . $newseed . ' (old seed:' . $user->get_data('seed') . ')', 9);
                                        $user->upd_data('seed', ($newseed));
                                        $json['newseed'] = $newseed;
                                        $json['success'] = true;
                                    } else {
                                        $json['error'] = 'Seed needs to have max 26 chars';
                                    }
                                } else {
                                    $json['error'] = 'Seed needs to have at least 3 chars';
                                }
                            } else {
                                $json['error'] = 'Seed cant contain special characters';
                            }
                        } else {
                            $json['error'] = 'You didnt enter a new seed';
                        }
                        unlock_user($user);
                    } else {
                        $json['error'] = 'You cannot perform this action because another action is currently in progress';
                    }
                }else{
                    $json['error'] = 'Please complete ReCaptcha';
                }
            } else {
                $json['error'] = 'Rate limit. Please try again later';
            }
        }else{
            $json['error'] = 'Please complete ReCaptcha';
        }
    } else {
        $json['error'] = 'You are not logged in';
    }
    echo_json($json);
}

function opencase_set_newpassword(){
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'setnewpassword', 2, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (!empty($_POST['new_passwordset'])) {
                    if (!empty($_POST['new_passwordset_confirm'])) {
                        if (!empty($_POST['old_passwordset'])) {
                            $oldpassword = strip_tags(trim($_POST['old_passwordset']));
                            $passw1 = strip_tags(trim($_POST['new_passwordset']));
                            $passw2 = strip_tags(trim($_POST['new_passwordset_confirm']));
                            $oldpassword = str_replace("%", "", $oldpassword);
                            $oldpassword = str_replace("_", "", $oldpassword);
                            $passw1 = str_replace("%", "", $passw1);
                            $passw1 = str_replace("_", "", $passw1);
                            $passw2 = str_replace("%", "", $passw2);
                            $passw2 = str_replace("_", "", $passw2);
                            if ($passw1 == $passw2) {
                                if (strlen($passw1) >= 5) {
                                    if (strlen($passw1) <= 30) {
                                        if (strlen($oldpassword) <= 30) {
                                            $curruserid = user()->get_id();
                                            $lvia = "site";
                                            $datauser = db()->query_once('SELECT * FROM users WHERE id = "' . safeescapestring(db()->nomysqlinj($curruserid)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($lvia)) . '" LIMIT 1');
                                            if (!empty($datauser)) {
                                                $oldpasswordcheck = md5(sha1(sha1(md5(md5(sha1(md5('USER' . ':' . CMSSECRET . ':' . $oldpassword)))))));
                                                $datauserold = db()->query_once('SELECT * FROM users WHERE id = "' . safeescapestring(db()->nomysqlinj($curruserid)) . '" AND password = "' . (db()->nomysqlinj($oldpasswordcheck)) . '" LIMIT 1');
                                                if (!empty($datauserold)) {
                                                    $newpasswordset = md5(sha1(sha1(md5(md5(sha1(md5('USER' . ':' . CMSSECRET . ':' . $passw1)))))));
                                                    db()->query_once('UPDATE `users` SET `password` = "' . (db()->nomysqlinj($newpasswordset)) . '" WHERE `id` = "' . safeescapestring(db()->nomysqlinj($datauser['id'])) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($lvia)) . '"');
                                                    $json = ['success' => true, 'msg' => 'Password has been successfully changed'];
                                                } else {
                                                    $json['msg'] = "Your old password is incorrect.";
                                                }
                                            } else {
                                                $json['msg'] = "You cant change password if you logged in using 3rd party.";
                                            }
                                        } else {
                                            $json['msg'] = "Your old password is incorrect.";
                                        }
                                    } else {
                                        $json['msg'] = "New password needs to contain max 30 chars.";
                                    }
                                } else {
                                    $json['msg'] = "New password needs to contain at least 5 chars.";
                                }
                            } else {
                                $json['msg'] = "Password confirmation doesnt match.";
                            }
                        } else {
                            $json['msg'] = "You need to enter your current password.";
                        }
                    } else {
                        $json['msg'] = "You need to enter password confirmation.";
                    }
                } else {
                    $json['msg'] = "You need to enter your new password.";
                }
                unlock_user($userloggexfh);
            } else {
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = "Rate limit. Please try again later";
        }
    }
    echo_json($json);
}

function opencase_userefcode()
{
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'userefcode', 3, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (!empty($_POST['refc_use'])) {
                    $refcuse = safeescapestring(strip_tags(trim($_POST['refc_use'])));
                    $usera = new user(user()->get_id());
                    if (strlen($refcuse) <= 30) {
                        if (!preg_match('/[^a-zA-Z0-9]+/', $refcuse)) {
                            if (empty($usera->get_data('used_ref_code'))) {
                                $dbqcr = db()->query_once('SELECT * FROM users_data WHERE user_field_id = 19 AND value = "' . safeescapestring(db()->nomysqlinj($refcuse)) . '" LIMIT 1');
                                if (!empty($dbqcr)) {
                                    if ($dbqcr["user_id"] != user()->get_id()) {
                                        if (!empty($refcuse)) {
                                            db()->query_once('INSERT INTO `referral_user` (`referral_id`, `referrer_id`) VALUES ("' . safeescapestring(db()->nomysqlinj(user()->get_id())) . '", "' . safeescapestring(db()->nomysqlinj($dbqcr["user_id"])) . '");');
                                            $usera->set_data('used_ref_code', $refcuse);
                                            $usera->update();
                                            $json['msg'] = "Referral code has been used successfully";
                                            $json['success'] = true;
                                        }
                                    } else {
                                        $json['msg'] = "You cant use your own referral code.";
                                    }
                                } else {
                                    $json['msg'] = "This referral code doesnt exist.";
                                }
                            } else {
                                if (get_count_case_per_period(1, user()->get_id()) == 0) {
                                    $json['usedrbnused'] = 1;
                                    $json['msg'] = "used ref code but didnt open case yet";
                                } else {
                                    $json['msg'] = "You have already used referral code.";
                                }
                            }
                        } else {
                            $json['msg'] = "Invalid referral code.";
                        }
                    } else {
                        $json['msg'] = "Invalid referral code.";
                    }
                } else {
                    $json['msg'] = "You need to enter referral code.";
                }
                unlock_user($userloggexfh);
            } else {
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = "Rate limit. Please try again later";
        }
    }else{
        $json['loginneed'] = 1;
        $json['msg'] = "Please login to open free case";
    }
    echo_json($json);
}

function opencase_verify_googleauth(){
    $json = ['success' => false];
    if (!is_login()) {
            if (!empty($_POST['acto'])) {
                $acto = (strip_tags(trim($_POST['acto'])));
                if (strlen($acto) <= 250) {
                    if (rate_limit_check(getip(), 'verifygauth', 3, 5) == false) {
                        api_check_csrf();
                        $clientID = '386308555123-8rehuih0f3j87q08nnq89u5ea7v6fns1.apps.googleusercontent.com';
                        $clientSecret = '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';
                        $redirectUri = 'https://smirnoffonbahamas.vip/';
                        try {
                            $client = new Google_Client();
                            $client->setClientId($clientID);
                            $client->setClientSecret($clientSecret);
                            $client->setRedirectUri($redirectUri);
                            $client->addScope("email");
                            $client->addScope("profile");
                            $client->setAccessToken($acto);
                            $google_oauth = new Google_Service_Oauth2($client);
                            if ($google_oauth) {
                                $google_account_info = $google_oauth->userinfo->get();
                                if ($google_account_info) {
                                    $email = $google_account_info->email;
                                    $name = $google_account_info->name;
                                    $picture = $google_account_info->picture;
                                    $checkaccountexistg = db()->query_once('select * from users where email = "' . safeescapestring(db()->nomysqlinj($email)) . '" AND login_via = "google" LIMIT 1');
                                    if (empty($checkaccountexistg)) {
                                        $adk2 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $adk3 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $key = md5($adk3 . bin2hex(random_bytes(10)) . $adk2);
                                        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $key = md5($key . $addKey);

                                        $publicidrandomu = bin2hex(random_bytes(7)) . "" . bin2hex(random_bytes(7));

                                        $authuser = new user();
                                        $authuser->set_name(safeescapestring(strip_tags(trim($name))));
                                        $authuser->set_email(safeescapestring(strip_tags(trim($email))));
                                        $authuser->set_confirmed_email(1);
                                        $authuser->set_login_via("google");
                                        $authuser->set_emailconfirmkey(safeescapestring(db()->nomysqlinj($key)));
                                        $authuser->set_publicid($publicidrandomu);
                                        $authuser->add();

                                        $seedrandom = bin2hex(random_bytes(7));
                                        $ownrefcoderandom = bin2hex(random_bytes(8));

                                        $authuser->set_data('seed', $seedrandom);
                                        $authuser->set_data('image', safeescapestring(strip_tags(trim($picture))));
                                        $authuser->set_data('timecreated', time());
                                        $authuser->set_data('own_ref_code', $ownrefcoderandom);
                                        $authuser->update();

                                        add_log($authuser->get_id(), 'registration');
                                        $json['msg'] = "Account created successfully";
                                        $json['success'] = true;
                                        update_setval('opencase_count_users', get_setval('opencase_count_users') + 1);
                                        centrifugo::sendStats();
                                        $authuser->set_auth_cookie();
                                    } else {
                                        $authuser2 = new user($checkaccountexistg['id']);
                                        if (!$authuser2->get_banned()) {
                                            $authuser2->set_auth_cookie();
                                            $json['msg'] = "Logged in successfully";
                                            $json['success'] = true;
                                        } else {
                                            $authuser2->clear_auth_cookie();
                                            $json['msg'] = "You are banned from accessing this site";
                                            $json['success'] = false;
                                        }
                                    }
                                }
                            }
                        } catch (Exception $exception) {
                            //
                        }
                    }else{
                        $json['msg'] = "Rate limit. Please try again later";
                        $json['success'] = false;
                    }
                }
            }
    }
    echo_json($json);
}

function opencase_set_username(){
    $json = ['success' => false];
    if (!empty($_POST['new_username'])) {
            $newusername = safeescapestring(strip_tags(trim($_POST['new_username'])));
            if (!preg_match('/[^a-zA-Z0-9]+/', $newusername)) {
                if (!empty($newusername)) {
                    if (strlen($newusername) >= 5) {
                        if (strlen($newusername) <= 22) {
                            if (is_login()) {
                                if (rate_limit_check(getip(), 'setusername', 2, 5) == false) {
                                    api_check_csrf();
                                    $userloggexfh = user();
                                    if (!is_locked_user($userloggexfh)) {
                                        lock_user($userloggexfh);
                                        $useractu = new user(user()->get_id());
                                        if ($useractu->get_login_via() == "metamask") {
                                            if ($useractu->get_name() == substr($useractu->get_web3(), 0, 6)) {
                                                $useractu->set_name($newusername);
                                                $useractu->update();
                                                $json['success'] = true;
                                                $json['msg'] = "Username has been saved successfully";
                                            }
                                        }
                                        unlock_user($userloggexfh);
                                    } else {
                                        $json['success'] = false;
                                        $json['error'] = 'You cannot perform this action because another action is currently in progress';
                                    }
                                }else{
                                    $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                                }
                            }
                        } else {
                            $json = ['success' => false, 'error' => 'Username needs to have max 22 chars'];
                        }
                    } else {
                        $json = ['success' => false, 'error' => 'Username needs to have min 5 chars'];
                    }
                }
            }
    }
    echo_json($json);
}

function pubKeyToAddress($pubkey) {
    return "0x" . substr(Keccak::hash(substr(hex2bin($pubkey->encode("hex")), 1), 256), 24);
}

function verifySignature($message, $signature, $address) {
    $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);
    $sign = [
        'r' => substr($signature, 2, 64),
        's' => substr($signature, 66, 64),
    ];
    $recid = ord(hex2bin(substr($signature, 130, 2))) - 27;

    if ($recid != ($recid & 1)) {
        return false;
    }

    $pubkey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recid);
    $derived_address = '0x' . substr(Keccak::hash(substr(hex2bin($pubkey->encode('hex')), 1), 256), 24);

    return (strtolower($address) === $derived_address);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function opencase_get_nonce(){
    $json = ['success' => false];
    $nonce = generateRandomString(20);
    $walletnonce = safeescapestring(strip_tags(trim($_POST['wallet'])));
    if (!is_login()) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $walletnonce)) {
            if (rate_limit_check(getip(), 'getnonce', 3, 5) == false) {
                api_check_csrf();
                if (strlen($walletnonce) >= 38 && strlen($walletnonce) <= 44) {
                    $checknonce = db()->query_once('select * from nonces where wallet = "' . safeescapestring(db()->nomysqlinj($walletnonce)) . '" AND valid = 1 LIMIT 1');
                    if (!empty($checknonce)) {
                        $json['nonce'] = $checknonce['nonce'];
                        $json['success'] = true;
                    } else {
                        db()->query_once('INSERT INTO nonces (`nonce`, `wallet`, `valid`) VALUES ( "' . safeescapestring(db()->nomysqlinj($nonce)) . '", "' . safeescapestring(db()->nomysqlinj($walletnonce)) . '", 1);');
                        $json['success'] = true;
                        $json['nonce'] = $nonce;
                    }
                }
            }
        }
    }
    echo_json($json);
}

function opencase_verify_sig()
{
    $json = ['success' => false];
    $addresspost = safeescapestring(strip_tags(trim($_POST['address'])));
    if (!empty($addresspost)) {
        if (strlen($addresspost) <= 100) {
            if (!is_login()) {
                if (!preg_match('/[^a-zA-Z0-9]+/', $addresspost)) {
                    if (rate_limit_check(getip(), 'verifysig', 3, 5) == false) {
                        api_check_csrf();
                        $checknoncea = db()->query_once('select * from nonces where wallet = "' . safeescapestring(db()->nomysqlinj($addresspost)) . '" AND valid = 1 LIMIT 1');
                        if (!empty($checknoncea)) {
                            $messagepost = "Sign in to smirnoffonbahamas.vip Nonce:".safeescapestring(strip_tags(trim($checknoncea['nonce'])));
                            $signaturepost = safeescapestring(strip_tags(trim($_POST['signature'])));
                            if (!empty($signaturepost)) {
                                if (strlen($signaturepost) <= 250) {
                                    $address = $addresspost;
                                    $message = $messagepost;
                                    $signature = $signaturepost;

                                    if (verifySignature($message, $signature, $address)) {
                                        $json['success'] = true;
                                        $json['signature'] = "successsignature";
                                        $mtmskk = "metamask";
                                        db()->query_once('update nonces set `valid` = 0 where id = "' . safeescapestring(db()->nomysqlinj($checknoncea['id'])) . '"');
                                        $checkaccountexist = db()->query_once('select * from users where web3 = "' . safeescapestring(db()->nomysqlinj($address)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($mtmskk)) . '" LIMIT 1');
                                        if (empty($checkaccountexist)) {
                                            $adk2 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                            $adk3 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                            $key = md5($adk3 . bin2hex(random_bytes(10)) . $adk2);
                                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                            $key = md5($key . $addKey);

                                            $publicidrandomu = bin2hex(random_bytes(7)) . "" . bin2hex(random_bytes(7));

                                            $authuser = new user();
                                            $authuser->set_name(mysqli_real_escape_string(db()->db, substr($address, 0, 6)));
                                            $authuser->set_web3($address);
                                            $authuser->set_login_via("metamask");
                                            $authuser->set_emailconfirmkey(safeescapestring(db()->nomysqlinj($key)));
                                            $authuser->set_publicid($publicidrandomu);
                                            $authuser->add();

                                            $seedrandom = bin2hex(random_bytes(7));
                                            $ownrefcoderandom = bin2hex(random_bytes(8));

                                            $authuser->set_data('seed', $seedrandom);
                                            $authuser->set_data('image', 'https://api.multiavatar.com/' . safeescapestring(db()->nomysqlinj(substr($address, 0, 6))) . '.png');//default avatar
                                            $authuser->set_data('timecreated', time());
                                            $authuser->set_data('own_ref_code', $ownrefcoderandom);
                                            $authuser->update();

                                            add_log($authuser->get_id(), 'registration');
                                            $json['msg'] = "Account created successfully";
                                            update_setval('opencase_count_users', get_setval('opencase_count_users') + 1);
                                            centrifugo::sendStats();
                                            $authuser->set_auth_cookie();
                                        } else {
                                            $authuser2 = new user($checkaccountexist['id']);
                                            if (!$authuser2->get_banned()) {
                                                $authuser2->set_auth_cookie();
                                                $json['lgdins'] = 1;
                                                $json['msg'] = "Logged in successfully";
                                            } else {
                                                $authuser2->clear_auth_cookie();
                                                $json['msg'] = "You are banned from accessing this site";
                                                $json['success'] = false;
                                            }
                                        }

                                    } else {
                                        $json['signature'] = "failsignature";
                                    }
                                }
                            }
                        }
                    }else{
                        $json['msg'] = "Rate limit. Please try again later";
                        $json['success'] = false;
                    }
                }
            }
        }
    }
    echo_json($json);
}


function opencase_set_refcode()
{
    $json = ['success' => false];
    if (isset($_POST['affiliate_codenew'])) {
        if (is_login()) {
            if (rate_limit_check(getip(), 'setrefcode', 2, 5) == false) {
                api_check_csrf();
                $userloggexfh = user();
                if (!is_locked_user($userloggexfh)) {
                    lock_user($userloggexfh);
                    $userevv = new user(user()->get_id());
                    $usvaff = $userevv->get_data('own_ref_code');
                    $ownrefcode = strtolower(safeescapestring(strip_tags(trim($_POST['affiliate_codenew']))));
                    if (!preg_match('/[^a-zA-Z0-9]+/', $ownrefcode)) {
                        if ($usvaff != $ownrefcode) {
                            if (strlen($ownrefcode) >= 4) {
                                if (strlen($ownrefcode) <= 30) {
                                    $uownrfcode = db()->query('select * from users_data where user_field_id = 19 AND value = "' . safeescapestring(db()->nomysqlinj($ownrefcode)) . '"');
                                    if (empty($uownrfcode)) {
                                        $userevv->set_data('own_ref_code', $ownrefcode);
                                        $userevv->update();
                                        $json['success'] = true;
                                        $json['affiliatecode'] = $usvaff;
                                        $json['msg'] = 'Affiliate code has been successfully changed';
                                    } else {
                                        $json['msg'] = 'This referral code is already taken';
                                    }
                                } else {
                                    $json['msg'] = 'Referral code needs to have max 30 chars';
                                }
                            } else {
                                $json['msg'] = 'Referral code needs to have at least 4 chars';
                            }
                        } else {
                            $json['msg'] = 'Your affiliate code is the same as previous';
                        }
                    } else {
                        $json['msg'] = 'Referral code cant contain special characters';
                    }
                    unlock_user($userloggexfh);
                } else {
                    $json['msg'] = 'You cannot perform this action because another action is currently in progress';
                }
            }else{
                $json['msg'] = 'Rate limit. Please try again later';
            }
        } else {
            $json['msg'] = 'Not authorized';
        }
    }else{
        $json['msg'] = 'You need to specific your affiliate code';
    }
    echo_json($json);
}

function opencase_get_referrals()
{
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'getreferrals', 4, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);
                $cachekey = "getrefscache".safeescapestring(db()->nomysqlinj(user()->get_id()));
                $referals = '';
                if (!$redis->get($cachekey)) {
                    $referals = db()->query('select * from referral_user where referrer_id = "' . safeescapestring(db()->nomysqlinj(user()->get_id())) . '"');
                    $redis->set($cachekey, serialize($referals));
                    $redis->expire($cachekey, 60);
                } else {
                    $referals = unserialize($redis->get($cachekey));
                }
                $json['users'] = [];
                $totalprofit = 0;
                $totalusersreferd = 0;
                if (!empty($referals)) {
                    foreach ($referals as $rf) {
                        if ($rf['referral_id'] != '') {
                            $user = new user($rf['referral_id']);
                            $json['users'][] = [
                                'name' => $user->get_name(),
                                'publicid' => $user->get_publicid(),
                                'image' => $user->get_data('image'),
                                'casesopened' => get_user_count_cases($user),
                                'profitoff' => $rf['profit']
                            ];
                            $totalprofit += $rf['profit'];
                            $totalusersreferd++;
                        }
                    }
                }
                $userevv = new user(user()->get_id());
                $usvaff = $userevv->get_data('own_ref_code');
                $json['affiliatecode'] = $usvaff;
                $json['success'] = true;
                $json['totalprofit'] = $totalprofit;
                $json['totalusersreferd'] = $totalusersreferd;
                unlock_user($userloggexfh);
            } else {
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['msg'] = 'Not authorized';
    }
    echo_json($json);
}

function opencase_chat_delete(){
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'chatdelete', 5, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (!empty($_POST['message_id'])) {
                    $userm = new user(user()->get_id());
                    $usermod = 0;
                    if ($userm->get_id() != '') {
                        $usermod = $userm->get_data('is_mod');
                    }
                    if ($usermod == 1) {
                        $message_id = $_POST['message_id'];
                        $message_id = safeescapestring(strip_tags(trim($message_id)));
                        db()->query_once('delete from chat where id = "' . safeescapestring(db()->nomysqlinj($message_id)) . '"');
                        centrifugo::deleteMessage($message_id);
                        $json['success'] = true;
                        $json['msg'] = 'Chat message deleted';
                    } else {
                        $json['msg'] = 'Not authorized';
                    }
                } else {
                    $json['msg'] = 'Message id empty';
                }
                unlock_user($userloggexfh);
            } else {
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['msg'] = 'Not authorized';
    }
    echo_json($json);
}

function opencase_chat_ban(){
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'chatban', 5, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (!empty($_POST['message_id'])) {
                    $userm = new user(user()->get_id());
                    $usermod = 0;
                    if ($userm->get_id() != '') {
                        $usermod = $userm->get_data('is_mod');
                    }
                    if ($usermod == 1) {
                        $message_id = $_POST['message_id'];
                        $message_id = safeescapestring(strip_tags(trim($message_id)));
                        $checkifchatmsbxs = db()->query_once('select * from chat where id = "' . safeescapestring(db()->nomysqlinj($message_id)) . '" ORDER BY id DESC LIMIT 1');
                        if (!is_null($checkifchatmsbxs)) {
                            db()->query_once('delete from chat where id = "' . safeescapestring(db()->nomysqlinj($message_id)) . '"');
                            centrifugo::deleteMessage($message_id);
                            $userchatbnd = new user($checkifchatmsbxs['user_id']);
                            $userchatbnd->set_data('chat_ban', 1);
                            $userchatbnd->update();

                            $json['success'] = true;
                            $json['msg'] = 'User banned and chat message deleted';
                        }
                    } else {
                        $json['msg'] = 'Not authorized';
                    }
                } else {
                    $json['msg'] = 'Message id empty';
                }
                unlock_user($userloggexfh);
            } else {
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['msg'] = 'Not authorized';
    }
    echo_json($json);
}

function opencase_getchat_last() {
    $lastchat = array('success' => false);
    if (rate_limit_check(getip(), 'getchatlast', 3, 4) == false) {
        api_check_csrf();
        $lastchatx = db()->query('SELECT * FROM chat ORDER BY id DESC LIMIT 20');
        $lastchat['chatm'] = array();
        if (!empty($lastchatx)) {
            $lastchat['success'] = true;
            foreach ($lastchatx as $cd) {
                $usermsg = new user($cd['user_id']);
                $usernamemsg = "";
                $userexp = 1;
                $useravatar = "";
                $usercpublicid = "";
                $usermodpower = 0;
                if ($usermsg->get_id() != '') {
                    $usernamemsg = $usermsg->get_name();
                    $userexp = $usermsg->get_data('exp');
                    $useravatar = $usermsg->get_data('image');
                    $usercpublicid = $usermsg->get_publicid();
                    $userchismod = $usermsg->get_data('is_mod');
                    if ($userchismod == 1){
                        $usermodpower = 1;
                    }
                    if ($usermsg->get_id() == 12){
                        $usermodpower = 2;
                    }
                }
                array_push($lastchat['chatm'], array(
                    'id' => $cd['id'],
                    'message' => $cd['message'],
                    'time' => $cd['time'],
                    'username' => $usernamemsg,
                    'userexp' => $userexp,
                    'publicid' => $usercpublicid,
                    'useravatar' => $useravatar,
                    'modpower' => $usermodpower
                ));
            }
        }
    }else{
        $lastchat['err'] = "ratelimit";
    }
    echo_json($lastchat);
}

function opencase_chat_send() {
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'chatsend', 3, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (!empty($_POST['chat_message'])) {
                    $usermod = 0;
                    if ($userloggexfh->get_id() != '') {
                        $usermod = $userloggexfh->get_data('is_mod');
                    }
                    if (get_setval('opencase_enablechat') == 1 || $usermod == 1) {
                        $chatmessage = $_POST['chat_message'];
                        $chatmessage = substr(safeescapestring(strip_tags(trim($chatmessage))), 0, 60);
                        if ($chatmessage != "" && !empty($chatmessage)) {
                            if (strlen($chatmessage) <= 60) {
                                if (strlen($chatmessage) >= 3) {
                                    if (!preg_match('/[^a-zA-Z0-9:!.*$,? ]+/', $chatmessage)) {
                                        $usermsg = new user(user()->get_id());
                                        $usernamemsg = "";
                                        $userexp = 1;
                                        $useravatar = "";
                                        $chatban = 0;
                                        $usermodpower = 0;
                                        if ($usermsg->get_id() != '') {
                                            $usernamemsg = $usermsg->get_name();
                                            $userexp = $usermsg->get_data('exp');
                                            $useravatar = $usermsg->get_data('image');
                                            $chatban = $usermsg->get_data('chat_ban');
                                            $userchismod = $usermsg->get_data('is_mod');
                                            if ($userchismod == 1){
                                                $usermodpower = 1;
                                            }
                                            if ($usermsg->get_id() == 12){
                                                $usermodpower = 2;
                                            }
                                        }

                                        if ($chatban == 0) {
                                            $lvlusrc = ((pow($userexp/1000, 1/2)) + 1);

                                            if ($lvlusrc > 1) {
                                                $chatmessage = str_replace(":blueheart:", "<img src='https://smirnoffonbahamas.vip/uploads/blueheart.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":bonk:", "<img src='https://smirnoffonbahamas.vip/uploads/bonk.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":bruh:", "<img src='https://smirnoffonbahamas.vip/uploads/bruh.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":catjump:", "<img src='https://smirnoffonbahamas.vip/uploads/catjump.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":catokay:", "<img src='https://smirnoffonbahamas.vip/uploads/catokay.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":dogeshy:", "<img src='https://smirnoffonbahamas.vip/uploads/dogeshy.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":fire:", "<img src='https://smirnoffonbahamas.vip/uploads/fire.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":insane:", "<img src='https://smirnoffonbahamas.vip/uploads/insane.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepecopium:", "<img src='https://smirnoffonbahamas.vip/uploads/pepecopium.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepecross:", "<img src='https://smirnoffonbahamas.vip/uploads/pepecross.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepelove:", "<img src='https://smirnoffonbahamas.vip/uploads/pepelove.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepesalute:", "<img src='https://smirnoffonbahamas.vip/uploads/pepesalute.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepethink:", "<img src='https://smirnoffonbahamas.vip/uploads/pepethink.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pogging:", "<img src='https://smirnoffonbahamas.vip/uploads/pogging.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":redheart:", "<img src='https://smirnoffonbahamas.vip/uploads/redheart.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":rip:", "<img src='https://smirnoffonbahamas.vip/uploads/rip.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":bayc:", "<img src='https://smirnoffonbahamas.vip/uploads/bayc.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":kleexcited:", "<img src='https://smirnoffonbahamas.vip/uploads/kleexcited.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":milady:", "<img src='https://smirnoffonbahamas.vip/uploads/milady.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":moonbirds:", "<img src='https://smirnoffonbahamas.vip/uploads/moonbirds.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":okboomer:", "<img src='https://smirnoffonbahamas.vip/uploads/okboomer.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":peperain:", "<img src='https://smirnoffonbahamas.vip/uploads/peperain.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":pikachu:", "<img src='https://smirnoffonbahamas.vip/uploads/pikachu.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":yocigood:", "<img src='https://smirnoffonbahamas.vip/uploads/yocigood.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":cake:", "<img src='https://smirnoffonbahamas.vip/uploads/cake.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":flushed:", "<img src='https://smirnoffonbahamas.vip/uploads/flushed.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":heartlove:", "<img src='https://smirnoffonbahamas.vip/uploads/heartlove.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":ily:", "<img src='https://smirnoffonbahamas.vip/uploads/ily.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":kittylove:", "<img src='https://smirnoffonbahamas.vip/uploads/kittylove.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":monkas:", "<img src='https://smirnoffonbahamas.vip/uploads/monkas.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":mushroom:", "<img src='https://smirnoffonbahamas.vip/uploads/mushroom.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepecomfy:", "<img src='https://smirnoffonbahamas.vip/uploads/pepecomfy.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepeez:", "<img src='https://smirnoffonbahamas.vip/uploads/pepeez.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepehands:", "<img src='https://smirnoffonbahamas.vip/uploads/pepehands.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepehappy:", "<img src='https://smirnoffonbahamas.vip/uploads/pepehappy.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepeheart:", "<img src='https://smirnoffonbahamas.vip/uploads/pepeheart.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepehmm:", "<img src='https://smirnoffonbahamas.vip/uploads/pepehmm.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepeno:", "<img src='https://smirnoffonbahamas.vip/uploads/pepeno.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepewin:", "<img src='https://smirnoffonbahamas.vip/uploads/pepewin.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pepeyes:", "<img src='https://smirnoffonbahamas.vip/uploads/pepeyes.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pinkcoffee:", "<img src='https://smirnoffonbahamas.vip/uploads/pinkcoffee.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":sadge:", "<img src='https://smirnoffonbahamas.vip/uploads/sadge.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":uwucat:", "<img src='https://smirnoffonbahamas.vip/uploads/uwucat.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":pressf:", "<img src='https://smirnoffonbahamas.vip/uploads/pressf.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":clover:", "<img src='https://smirnoffonbahamas.vip/uploads/clover.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":sailormoonwink:", "<img src='https://smirnoffonbahamas.vip/uploads/sailormoonwink.gif'/>", $chatmessage);
                                                $chatmessage = str_replace(":shootingstars:", "<img src='https://smirnoffonbahamas.vip/uploads/shootingstars.png'/>", $chatmessage);
                                                $chatmessage = str_replace(":bigshibaspin:", "<img src='https://smirnoffonbahamas.vip/uploads/bigshibaspin.gif'/>", $chatmessage);
                                                $chatmessage = str_replace("scam", "****", $chatmessage);
                                                $chatmessage = str_replace("fucking", "*******", $chatmessage);
                                                $chatmessage = str_replace("nigga", "*****", $chatmessage);
                                                $chatmessage = str_replace("nigger", "******", $chatmessage);
                                                $chatmessage = str_replace("hitler", "******", $chatmessage);
                                                $chatmessage = str_replace("s c a m", "*******", $chatmessage);
                                                $chatmessage = str_replace("sc am", "*****", $chatmessage);
                                                $chatmessage = str_replace("s cam", "*****", $chatmessage);
                                                $chatmessage = str_replace("sca m", "*****", $chatmessage);
                                                $chatmessage = str_replace("porn", "****", $chatmessage);
                                                $chatmessage = str_replace("fucking", "*******", $chatmessage);
                                                $chatmessage = str_replace("f u c k i n g", "********", $chatmessage);
                                                $chatmessage = str_replace("faggot", "******", $chatmessage);
                                                $chatmessage = str_replace("asshole", "*******", $chatmessage);
                                                $chatmessage = str_replace("roobet", "******", $chatmessage);
                                                $chatmessage = str_replace("rollbit", "*******", $chatmessage);
                                                $chatmessage = str_replace("duelbits", "********", $chatmessage);
                                                $chatmessage = str_replace("bcgame", "******", $chatmessage);
                                                $chatmessage = str_replace("csgo500", "*******", $chatmessage);
                                                $chatmessage = str_replace("csgoempire", "**********", $chatmessage);
                                                $chatmessage = str_replace("metawin", "*******", $chatmessage);
                                                $chatmessage = str_replace("csgoroll", "********", $chatmessage);
                                                $chatmessage = str_replace("roll bit", "*******", $chatmessage);

                                                $emojicount = substr_count($chatmessage, "<img");
                                                if ($emojicount <= 4) {
                                                    $lasttimechatted = db()->query_once('SELECT time FROM chat WHERE user_id = "' . safeescapestring(db()->nomysqlinj(user()->get_id())) . '" ORDER BY id DESC LIMIT 1');
                                                    if (empty($lasttimechatted)) {
                                                        $chat = new chat();
                                                        $chat->set_user_id(user()->get_id());
                                                        $chat->set_message($chatmessage);
                                                        $chat->add_chat_message();
                                                        $chatlastid = db()->get_last_id();
                                                        $json['success'] = true;
                                                        $json['msg'] = 'Chat message sent';
                                                        centrifugo::chatMessage(user()->get_id(), $chatmessage, $usernamemsg, $userexp, $useravatar, $chatlastid, $usermodpower);
                                                    } else {
                                                        if ((strtotime($lasttimechatted['time']) + 20) < time()) {
                                                            $chat = new chat();
                                                            $chat->set_user_id(user()->get_id());
                                                            $chat->set_message($chatmessage);
                                                            $chat->add_chat_message();
                                                            $chatlastid = db()->get_last_id();
                                                            $json['success'] = true;
                                                            $json['msg'] = 'Chat message sent';
                                                            centrifugo::chatMessage(user()->get_id(), $chatmessage, $usernamemsg, $userexp, $useravatar, $chatlastid, $usermodpower);
                                                        } else {
                                                            $json['error'] = 'Chat cooldown 20 seconds';
                                                        }
                                                    }
                                                } else {
                                                    $json['error'] = 'Max 4 emoji in one chat message';
                                                }
                                            }else{
                                                $json['error'] = 'To chat you need to be level 2';
                                            }
                                        } else {
                                            $json['error'] = 'You are banned from chatting';
                                        }
                                    } else {
                                        $json['error'] = 'Message cant contain special characters';
                                    }
                                } else {
                                    $json['error'] = 'Chat message must contain at least 3 chars';
                                }
                            } else {
                                $json['error'] = 'Chat message can contain max 60 chars';
                            }
                        } else {
                            $json['error'] = 'You did not enter a chat message';
                        }
                    } else {
                        $json['error'] = 'Chat is disabled for a maintenance';
                    }
                } else {
                    $json['error'] = 'You did not enter a chat message';
                }
                unlock_user($userloggexfh);
            } else {
                $json['error'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
    } else {
        $json['error'] = 'You are not logged in';
    }
    echo_json($json);
}

function opencase_resendemailconf(){
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'resendemailconf', 1, 120) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);

                $useremcnf = new user(user()->get_id());

                if ($useremcnf->get_confirmed_email() == 0){

                    if ($useremcnf->get_login_via() == "site"){
                        $mg = Mailgun::create('ba60548dda7bd93486e3d21e9fdea0fd-100b5c8d-7bc992ce');
                        $domain = "sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org";
                        $mg->messages()->send($domain, [
                            'from' => 'Mailgun Sandbox <postmaster@sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org>',
                            'to' => $useremcnf->get_email(),
                            'subject' => 'Website - Email confirmation',
                            'text' => 'Confirm your email address by visiting: https://website.com/?emverify=' . $useremcnf->get_emailconfirmkey() .''
                        ]);

                        $json['success'] = true;
                        $json['msg'] = "Email confirmation has been sent";
                    }else{
                        $json['msg'] = 'You can only confirm email if logged via website, not third party';
                    }

                }else{
                    $json['msg'] = 'You already confirmed your email';
                }

                unlock_user($userloggexfh);
            }else{
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['msg'] = 'You are not logged in';
    }

    echo_json($json);
}


function opencase_confirmemail(){
    $json = ['success' => false];
    if (is_login()) {
        if (rate_limit_check(getip(), 'confirmemailun', 1, 4) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);

                $useremcnf = new user(user()->get_id());

                if ($useremcnf->get_confirmed_email() == 0){
                    if ($useremcnf->get_login_via() == "site"){
                        if (!empty($_POST['emailconficode'])) {

                            $emailconficode = $_POST['emailconficode'];
                            $emailconficode = safeescapestring(strip_tags(trim($emailconficode)));

                            if ($useremcnf->get_emailconfirmkey() == $emailconficode) {
                                $useremcnf->set_confirmed_email(1);
                                $useremcnf->update();

                                $json['success'] = true;
                                $json['msg'] = "Your email has been confirmed";

                            }else{
                                $json['msg'] = 'Email confirmation code doesnt match';
                            }
                        }else{
                            $json['msg'] = 'Please provide email confirmation code';
                        }

                    }else{
                        $json['msg'] = 'You can only confirm email if logged via website, not third party';
                    }
                }else{
                    $json['msg'] = 'You already confirmed your email';
                }

                unlock_user($userloggexfh);
            }else{
                $json['msg'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['msg'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['msg'] = 'Please login first to confirm your email';
    }

    echo_json($json);
}

function opencase_sale($args) {
	$user = user();
	$json = array('success' => false);
	$dritems = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($dritems) <= 100 && strlen($dritems) > 1) {
        if (rate_limit_check(getip(), 'sale', 1, 3) == false) {
            api_check_csrf();
            $droppedItem = new droppedItem($dritems);
            if ($user->get_id() != '' && $user->is_login()) {
                $userloggexfh = user();
                if (!is_locked_user($userloggexfh)) {
                    lock_user($userloggexfh);
                    if ($droppedItem->get_user_id() == $user->get_id()) {
                        if ($droppedItem->get_status() == 0 || $droppedItem->get_status() == 6) {
                            db()->query_once('UPDATE `opencase_droppeditems` SET `status` = 3 WHERE `id` = "' . safeescapestring(db()->nomysqlinj($dritems)) . '";');
                            inc_user_balance($user, $droppedItem->get_price());
                            add_balance_log($user->get_id(), $droppedItem->get_price(), 'Selling the NFT for balance dItem' . $droppedItem->get_id() . ' (' . $droppedItem->get_item_class()->get_name() . ')', 2);
                            $json['success'] = true;
                            $json['price'] = $droppedItem->get_price();
                            $json['balance'] = get_user_balance($user);
                            $json['msg'] = 'The NFT was successfully sold';
                            $redis = new Redis();
                            $redis->connect('127.0.0.1', 6379);
                            $cachekey = "getusedich".$user->get_publicid()."0"."18";
                            $cachekey2 = "getusedich".$user->get_publicid()."1"."18";
                            $cachekey3 = "getusedich".$user->get_publicid()."2"."18";
                            $cachekey4 = "getusedich".$user->get_publicid()."3"."18";
                            $cachekey5 = "getusedich".$user->get_publicid()."4"."18";
                            $cachekey6 = "getusedich".$user->get_publicid()."5"."18";
                            $cachekey7 = "getusedich".$user->get_publicid()."6"."18";
                            $cachekey8 = "getusedich".$user->get_publicid()."7"."18";
                            $cachekey9 = "getusedich".$user->get_publicid()."8"."18";
                            $cachekey10 = "getusedich".$user->get_publicid()."9"."18";
                            $cachekey11 = "getusedich".$user->get_publicid()."10"."18";
                            $cachekey12 = "droppeditemload".$droppedItem->get_id();
                            $redis->del($cachekey);
                            $redis->del($cachekey2);
                            $redis->del($cachekey3);
                            $redis->del($cachekey4);
                            $redis->del($cachekey5);
                            $redis->del($cachekey6);
                            $redis->del($cachekey7);
                            $redis->del($cachekey8);
                            $redis->del($cachekey9);
                            $redis->del($cachekey10);
                            $redis->del($cachekey11);
                            $redis->del($cachekey12);
                        } else {
                            $json['error'] = 'This NFT has already been sold or withdrawn';
                        }
                    } else {
                        $json['error'] = 'This NFT cannot be sold';
                    }
                    unlock_user($userloggexfh);
                } else {
                    $json['error'] = 'You cannot perform this action because another action is currently in progress';
                }
            } else {
                $json['error'] = 'You are not logged in';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['error'] = 'Invalid NFT';
    }
	echo_json($json);
}

function opencase_withdraw($args) {
	$user = user();
	$json = array('success' => false);
    $dritemsw = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($dritemsw) <= 100 && strlen($dritemsw) > 1) {
        if (rate_limit_check(getip(), 'withdraw', 2, 5) == false) {
            api_check_csrf();
            $droppedItem = new droppedItem($dritemsw);
            if ($user->get_id() != '' && $user->is_login()) {
                $userloggexfh = user();
                if (!is_locked_user($userloggexfh)) {
                    lock_user($userloggexfh);
                    if (get_setval('opencase_enablewithdrawnft') == 1) {
                        if ($user->get_data('eth_wallet') != '' && $user->get_data('solana_wallet') != '') {
                                if ($user->get_data('withdraw_disabled') != 1) {
                                    if ($droppedItem->get_withdrawable() && $droppedItem->get_user_id() == $user->get_id() && ($droppedItem->get_status() == 0 || $droppedItem->get_status() == 6)) {

                                    } else {
                                        $json['error'] = 'This NFT cannot be sent';
                                    }
                                } else {
                                    $json['error'] = 'The withdrawal of this NFT is unavailable. Please try again later';
                                }
                        } else {
                            $json['error'] = 'You do not have an trade link set up.';
                        }
                    } else {
                        $json['error'] = 'NFT sending is currently halted, please check social media announcements';
                    }
                    unlock_user($userloggexfh);
                } else {
                    $json['error'] = 'You cannot perform this action because another action is currently in progress';
                }
            } else {
                $json['error'] = 'You are not logged in';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
    }else{
        $json['error'] = 'Invalid item';
    }
	echo_json($json);
}

function opencase_open($args) {
	$timeStart = microtime(true);
	$user = user();
	$json = array('success' => false);
	$opscas = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($opscas) <= 100) {
        $case = new ocase($opscas);
        if ($case->get_id() != '') {
                if ($user->get_id() != '' && $user->is_login()) {
                    if (rate_limit_check(getip(), 'open', 2, 5) == false) {
                        api_check_csrf();
                        if (!is_locked_user($user)) {
                            lock_user($user);
                            if ($case->is_available()) {
                                if ($user->get_data('solana_wallet') != '') {
                                    if ($user->get_data('eth_wallet') != '') {
                                        if (get_setval('opencase_enablecases') == 1) {
                                            $casePrice = $case->get_final_price();
                                            if (get_user_balance($user) >= $casePrice) {
                                                $availOpen = false;
                                                $notAvailError = '';
                                                switch ($case->get_type()) {
                                                    case ocase::TYPE_DEFAULT:
                                                        if ($case->get_price() > 0) {
                                                            $availOpen = true;
                                                        } else {
                                                            $notAvailError = 'At the moment, this case is not available';
                                                        }
                                                        break;
                                                    case ocase::TYPE_PROMOCODE:
                                                        $promo = isset($_POST['promo']) ? $_POST['promo'] : '';
                                                        if (!empty($promo)) {
                                                            $ispromo = new promocode();
                                                            $ispromo->get_from_code($promo);
                                                            if ($ispromo->get_code() != '' && $ispromo->get_enable() && $ispromo->get_type() == promocode::TYPE_CASE) {
                                                                if ($ispromo->get_use() < $ispromo->get_count()) {
                                                                    if ($ispromo->user_can_use($user->get_id())) {
                                                                        if ($case->get_dep_for_open() <= 0 || get_count_deposite_per_period($user->get_id()) >= $case->get_dep_for_open()) {
                                                                            $availOpen = true;
                                                                        } else {
                                                                            $depositDays = get_setval('opencase_deposit_check_day');
                                                                            if ($depositDays == 1) {
                                                                                $strEnd = 'day';
                                                                            } else {
                                                                                $strEnd = $depositDays . ' days';
                                                                            }
                                                                            $notAvailError = 'To open the promo case, you need to top up your balance at ' . $case->get_dep_for_open() . ' $ in the recent ' . $strEnd;
                                                                        }
                                                                    } else {
                                                                        $notAvailError = 'You have already used this code';
                                                                    }
                                                                } else {
                                                                    $notAvailError = 'Promotion code has already been activated the maximum number of times';
                                                                }
                                                            } else {
                                                                $notAvailError = 'There is no such promo code';
                                                            }
                                                        } else {
                                                            $notAvailError = 'You did not enter a promo code';
                                                        }
                                                        break;
                                                    case ocase::TYPE_DEPOSITE:
                                                        if (can_open_free_case($case)) {
                                                            $datafingx = db()->query_once('SELECT * FROM fingerprints WHERE userid = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" AND caseopened = 0');
                                                            if (!empty($datafingx)) {
                                                                $availOpen = true;
                                                            } else {
                                                                $notAvailError = 'You have already opened a free case on another account';
                                                            }
                                                        } else {
                                                            $notAvailError = 'You cannot open a free case because you do not meet all the conditions';
                                                        }
                                                        break;
                                                }
                                                if ($availOpen) {
                                                    $enabledItems = db()->query('select * from opencase_itemincase where case_id = "' . safeescapestring(db()->nomysqlinj($case->get_id())) . '" and (count_items = -1 or count_items > 0) and enabled = 1 and chance > 0 order by chance DESC');
                                                    $item_names = array();
                                                    $totalChance = (float)($user->get_data('chance') / 100) * (float)($case->get_chance() / 100);
                                                    $checkItemsPrice = $casePrice > 0 ? $casePrice : 100;
                                                    $items = [];
                                                    $otherItems = [];
                                                    foreach ($enabledItems as $item) {
                                                        $tmpItem = new item($item['item_id']);
                                                        $itemChanse = $item['chance'];
                                                        if ($tmpItem->get_status() == 1) {
                                                            if ($tmpItem->get_price() <= $checkItemsPrice) {
                                                                if ($totalChance > 0) {
                                                                    $itemChanse /= $totalChance;
                                                                }
                                                            } else {
                                                                if ($totalChance <= 0) {
                                                                    $otherItems[] = array('itemincase_id' => $item['id'], 'name' => $tmpItem->get_name(), 'chance' => $itemChanse, 'item_id' => $item['item_id'], 'withdrawable' => $item['withdrawable'], 'usable' => $item['usable'], 'image' => $tmpItem->get_image(), 'rarity' => $tmpItem->get_css_quality_class(), 'quality' => $tmpItem->get_quality(), 'price' => $tmpItem->get_price(), 'network' => $tmpItem->get_network(), 'status' => $tmpItem->get_status(), 'date' => $tmpItem->get_date(), 'tranche' => $tmpItem->get_tranche());
                                                                    continue;
                                                                }
                                                                $itemChanse *= $totalChance;
                                                            }
                                                            $items[] = array('itemincase_id' => $item['id'], 'name' => $tmpItem->get_name(), 'chance' => $itemChanse, 'item_id' => $item['item_id'], 'withdrawable' => $item['withdrawable'], 'usable' => $item['usable'], 'image' => $tmpItem->get_image(), 'rarity' => $tmpItem->get_css_quality_class(), 'quality' => $tmpItem->get_quality(), 'price' => $tmpItem->get_price(), 'network' => $tmpItem->get_network(), 'status' => $tmpItem->get_status(), 'date' => $tmpItem->get_date(), 'tranche' => $tmpItem->get_tranche());
                                                        }
                                                    }
                                                    if (empty($items)) {
                                                        $items = $otherItems;
                                                    }

                                                    $haveItems = array();

                                                    if (count($enabledItems) > 0) {
                                                        foreach ($items as $item) {
                                                                $haveItems[] = $item;
                                                        }


                                                        $isMinPrice = false;
                                                        if (count($haveItems) == 0) {
                                                            $isMinPrice = true;
                                                            $haveItems = $items;
                                                            usort($haveItems, 'sortItemByPrice');
                                                        }

                                                        $sum = 0;
                                                        foreach ($haveItems as $key => $hItem) {
                                                            $sum += $hItem['chance'];
                                                        }

                                                        if (count($haveItems) > 0) {
                                                            $chance = rand(0, $sum - 1);
                                                            $i = 0;
                                                            $find = false;
                                                            $item = false;
                                                            foreach ($haveItems as $hItem) {
                                                                if ($chance >= $i && $chance < $i + (int)$hItem['chance'] && !$find) {
                                                                    $item = $hItem;
                                                                    $find = true;
                                                                } else {
                                                                    $i += (int)$hItem['chance'];
                                                                }
                                                            }

                                                            if ($isMinPrice)
                                                                $item = $haveItems[0];

                                                            if ($item) {
                                                                if (isset($ispromo) && $ispromo) {
                                                                    $ispromo->use_promocode($user->get_id());
                                                                }
                                                                dec_user_balance($user, $casePrice);
                                                                add_balance_log($user->get_id(), -$casePrice, 'Opening the case №' . $case->get_id() . ' (' . $case->get_name() . ')', 1);

                                                                $dItem = new droppedItem();
                                                                $itemPrice = round($item['price']);
                                                                if ($item['item_id'] == 15694) {
                                                                    $dItem->set_parametrs('', $user->get_id(), $item['item_id'], 5, $itemPrice, '', 3, $case->get_id(), 0, 0, 0, '', $item['withdrawable'], $item['usable'], '', $item['name'], $item['image'], $item['network'], $item['mintaddress'], '', $casePrice);
                                                                } else {
                                                                    $dItem->set_parametrs('', $user->get_id(), $item['item_id'], 5, $itemPrice, '', 0, $case->get_id(), 0, 0, 0, '', $item['withdrawable'], $item['usable'], '', $item['name'], $item['image'], $item['network'], $item['mintaddress'], '', $casePrice);
                                                                }
                                                                //function set_parametrs( $id, $user_id, $item_id, $quality, $price, $time_drop, $status, $from, $fast, $offer_id, $bot_id, $error = '', $withdrawable = 1, $usable = 1, $analog_id = null, $name = null, $image = null, $network = null, $mintaddress = null, $publicid = null, $caseprice = null) {
                                                                $time = $dItem->add_droppedItem();
                                                                $itemID = $dItem->get_id();
                                                                $openCase = new openCase();
                                                                $openCase->set_parametrs('', $user->get_id(), $case->get_id(), $itemID, $casePrice, '');
                                                                $openCase->add_openCase();
                                                                $case->inc_open_count();
                                                                $itemincase = new itemincase($item['itemincase_id']);
                                                                if ($itemincase->get_count_items() > 0) {
                                                                    $itemincase->set_count_items($itemincase->get_count_items() - 1);
                                                                    $itemincase->update_itemincase();
                                                                }
                                                                $needProfit = $casePrice * (1 - (float)(get_setval('opencase_chance') / 100));
                                                                $profit = $casePrice - $itemPrice;
                                                                $descProfit = $profit - $needProfit;
                                                                if ($item['item_id'] == 15694) {
                                                                    inc_user_balance($user, 100);
                                                                    add_balance_log($user->get_id(), -$casePrice, 'Opening the case №' . $case->get_id() . ' (' . $case->get_name() . ') BalanceOnSite', 1);
                                                                }
                                                                update_setval('opencase_count_open_case', get_setval('opencase_count_open_case') + 1);
                                                                if ($case->get_type() == 0 || $case->get_type() == 1 || $case->get_type() == "0" || $case->get_type() == "1"){
                                                                    inc_user_exp($user, $casePrice*100);
                                                                }
                                                                if ($case->get_type() == 2 || $case->get_type() == "2") {
                                                                    db()->query_once('UPDATE `fingerprints` SET `caseopened` = 1 WHERE `userid` = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '";');
                                                                }
                                                                if ($item['item_id'] != 15694) {
                                                                    $setitemstat = new item($item['item_id']);
                                                                    $setitemstat->set_status(2);
                                                                    $setitemstat->update_item();
                                                                }
                                                                $json['success'] = true;
                                                                $json['item'] = array('ID' => $itemID, 'name' => $item['name'], 'shortName' => $item['name'], 'quality' => $item['quality'] ?? '', 'image' => $item['image'], 'chance' => $item['chance'], 'price' => $itemPrice, 'rarity' => $item['rarity'] ?? '', 'usable' => ((bool)$item['usable']));
                                                                $json['balance'] = get_user_balance($user);
                                                                $json['exp'] = get_user_exp($user);
                                                                centrifugo::sendItem($dItem, $time);
                                                                centrifugo::sendStats();
                                                            } else {
                                                                $json['error'] = 'An error occurred when opening the case, try again later';
                                                            }
                                                        } else {
                                                            $json['error'] = 'An error occurred when opening the case, try again later';
                                                        }
                                                    } else {
                                                        $json['error'] = 'An error occurred when opening the case, try again later';
                                                    }
                                                } else {
                                                    $json['error'] = $notAvailError;
                                                }
                                            } else {
                                                $json['error'] = 'You do not have enough balance to open this case';
                                            }
                                        } else {
                                            $json['error'] = 'Opening mystery boxes is temporary disabled.';
                                        }
                                    } else {
                                        $json['error'] = 'You need to set up your Ethereum wallet address, to receive NFT.';
                                    }
                                } else {
                                    $json['error'] = 'You need to set up your Solana wallet address, to receive NFT.';
                                }
                            } else {
                                $json['error'] = 'At the moment, this case is not available';
                            }
                            unlock_user($user);
                        } else {
                            $json['error'] = 'You cannot perform this action because another action is currently in progress';
                        }
                    }else{
                        $json['error'] = 'Rate limit. Please try again later';
                    }
                } else {
                    $json['error'] = 'You are not logged in';
                }
        } else {
            $json['error'] = 'There is no such case';
        }
    }else{
        $json['error'] = 'Invalid case';
    }
	$timeEnd = microtime(true);
	$json['speed'] = $timeEnd - $timeStart;
	echo_json($json);
}

function opencase_save_ethwallet() {
    $json = array('success' => false);
    $user = user();
    if ($user->get_id() != '' && $user->is_login()) {
        if (rate_limit_check(getip(), 'saveethwallet', 1, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (isset($_POST['eth_wallet']) && $_POST['eth_wallet'] != '') {
                    $ethwallet = safeescapestring(strip_tags(trim(db()->nomysqlinj($_POST['eth_wallet']))));
                    if (!preg_match('/[^a-zA-Z0-9]+/', $ethwallet)) {
                        if (strlen($ethwallet) >= 38 && strlen($ethwallet) <= 44) {
                            $user->upd_data('eth_wallet', ($ethwallet));
                            $json['success'] = true;
                        } else {
                            $json['error'] = 'Invalid Ethereum wallet address';
                        }
                    } else {
                        $json['error'] = 'Invalid Ethereum wallet address';
                    }
                } else {
                    $json['error'] = 'You didnt enter a Ethereum wallet address';
                }
                unlock_user($userloggexfh);
            } else {
                $json['error'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
    } else {
        $json['error'] = 'You are not logged in';
    }
    echo_json($json);
}

function opencase_save_solwallet() {
    $json = array('success' => false);
    $user = user();
    if ($user->get_id() != '' && $user->is_login()) {
        if (rate_limit_check(getip(), 'savesolwallet', 1, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (isset($_POST['sol_wallet']) && $_POST['sol_wallet'] != '') {
                    $solwallet = safeescapestring(strip_tags(trim(db()->nomysqlinj($_POST['sol_wallet']))));
                    if (!preg_match('/[^a-zA-Z0-9]+/', $solwallet)) {
                        if (strlen($solwallet) >= 22 && strlen($solwallet) <= 45) {
                            $user->upd_data('solana_wallet', ($solwallet));
                            $json['success'] = true;
                        } else {
                            $json['error'] = 'Invalid Solana wallet address';
                        }
                    } else {
                        $json['error'] = 'Invalid Solana wallet address';
                    }
                } else {
                    $json['error'] = 'You didnt enter a Solana wallet address';
                }
                unlock_user($userloggexfh);
            } else {
                $json['error'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
    } else {
        $json['error'] = 'You are not logged in';
    }
    echo_json($json);
}

function opencase_getstat() {
    $json = array('success' => false);


    if (rate_limit_check(getip(), 'getstat', 4, 5) == false) {
        api_check_csrf();
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $cachekey = "getstatscache";
        $json = '';
        if (!$redis->get($cachekey)) {
            $json = array(
                'success' => true,
                'count_open_case' => get_count_open_cases(),
                'count_reg_users' => get_count_reg_users(),
                'online' => get_count_onlie(),
                'today_count_open_case' => get_count_today_open_cases(),
            );
            $redis->set($cachekey, serialize($json));
            $redis->expire($cachekey, 20);
        } else {
            $json = unserialize($redis->get($cachekey));
        }

        $json = array_merge($json, stats::getAdditionalStatsArray());
    }


	echo_json($json);
}

function opencase_getnewdrop() {
	$json = array('success' => false);
    if (rate_limit_check(getip(), 'getnewdrop', 5, 5) == false) {
        api_check_csrf();
        if (!empty($_POST['lastupdate']) && is_sqldate($_POST['lastupdate'])) {
            $lastUpdate = safeescapestring(strip_tags(trim($_POST['lastupdate'])));
            if (strlen($lastUpdate) <= 100) {
                $dItems = new droppedItem();
                $dItems = $dItems->get_newDroppedItems($lastUpdate, 'DESC', 20);
            }
        } else {
            $dItems = get_last_dropped_items();
        }
        $users = [];
        if (count($dItems) > 0) {
            $items = array();
            foreach ($dItems as $dItem) {
                if (empty($users[$dItem->get_user_id()])) {
                    $users[$dItem->get_user_id()] = $dItem->get_user_class();
                }
                $user = $users[$dItem->get_user_id()];
                $item = array(
                    'id' => $dItem->get_id(),
                    'rarity' => $dItem->get_text_rarity(),
                    'from' => $dItem->get_from(),
                    'image' => $dItem->get_image(),
                    'name' => $dItem->get_name(),
                    'time' => $dItem->get_time_drop(),
                    'price' => $dItem->get_price(),
                    'user_id' => $user->get_publicid(),
                    'user_img' => $user->get_data('image'),
                    'user_name' => $user->get_name(),
                    'source_img' => $dItem->get_source_image(),
                    'source_img_alt' => $dItem->get_source_image_alt(),
                    'source_css_class' => $dItem->get_source_css_class(),
                    'source_link' => $dItem->get_source_link(),
                );
                array_push($items, $item);
            }
            $json['success'] = true;
            $json['items'] = $items;
        }else{
            $json['msg'] = 'noditems';
        }
    }else{
        $json['msg'] = 'ratelimit';
    }
	echo_json($json);
}

function opencase_getuserdrops() {
	$json = array('success' => false, 'not_items' => true);
	if (isset($_POST['page']) && isset($_POST['user_id'])) {
        if(strlen($_POST['page']) <= 100) {
            if(strlen($_POST['user_id']) <= 150) {
                if (rate_limit_check(getip(), 'getuserdrops', 5, 5) == false) {
                    api_check_csrf();
                    $where = [];
                    if (!preg_match('/[^a-zA-Z0-9-]+/', $_POST['user_id'])) {
                        if (!preg_match('/[^a-zA-Z0-9]+/', $_POST['page'])) {
                            $dropItems = get_user_drops(safeescapestring(strip_tags(trim($_POST['user_id']))), (!empty($where) ? implode(' AND ', $where) : false), safeescapestring(strip_tags(trim($_POST['page']))));
                            if (count($dropItems) > 0) {
                                $other = true;
                                if (is_login() && user()->get_id() == $_POST['user_id']) {
                                    $other = false;
                                }
                                $items = array();
                                foreach ($dropItems as $dItem) {
                                    $item = array(
                                        'id' => $dItem->get_id(),
                                        'rarity' => $dItem->get_text_rarity(),
                                        'from' => $dItem->get_from(),
                                        'status' => $dItem->get_status(),
                                        'image' => $dItem->get_image(),
                                        'name' => $dItem->get_name(),
                                        'other' => $other,
                                        'price' => $dItem->get_price(),
                                        'source_img' => $dItem->get_source_image(),
                                        'source_img_alt' => $dItem->get_source_image_alt(),
                                        'source_css_class' => $dItem->get_source_css_class(),
                                        'source_link' => $dItem->get_source_link(),
                                        'date' => $dItem->get_time_drop(),
                                        'withdrawable' => (bool)$dItem->get_withdrawable(),
                                        'usable' => (bool)$dItem->get_usable(),
                                        'error' => $other ? false : (empty($dItem->get_error()) ? false : $dItem->get_error())
                                    );
                                    $item['timer'] = false;
                                    array_push($items, $item);
                                }
                                if (count($dropItems) > 17) {
                                    $json['not_items'] = false;
                                }
                                $json['success'] = true;
                                $json['items'] = $items;
                            } else {
                                $json['error_code'] = 'No nft drop';
                            }
                        }
                    }
                }else{
                    $json['error_code'] = 'Rate limit. Please try again later';
                    $json['not_items'] = false;
                }
            }else{
                $json['error_code'] = 'Invalid parameters';
                $json['not_items'] = false;
            }
        }else{
            $json['error_code'] = 'Invalid parameters';
            $json['not_items'] = false;
        }
	} else {
		$json['error_code'] = 'Invalid parameters';
		$json['not_items'] = false;
	}
	echo_json($json);
}

function opencase_get_user_opendcasesdrop() {
    $json = ['success' => false];
    if (rate_limit_check(getip(), 'getusopndcd', 5, 5) == false) {
        api_check_csrfuser();
        $user = user();
        if ($user->get_id() != '' && $user->is_login()) {
            $json['success'] = true;
            $json['openedcases'] = [];

            $where = false;
            $count = 100;
            $page = 0;
            $droppedItem = new droppedItem();

            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $cachekey = "getusropdndrp".safeescapestring(db()->nomysqlinj(user()->get_id()));

            $dItems = '';

            if (!$redis->get($cachekey)) {
                $dItems = $droppedItem->get_droppedItems('user_id = "' . safeescapestring(db()->nomysqlinj(user()->get_id())) .'"' . ($where ? ' and ' . $where : ''), 'id DESC', $count > 0 ? (safeescapestring(db()->nomysqlinj($page)) * $count) . ', ' . $count : '');
                $redis->set($cachekey, serialize($dItems));
                $redis->expire($cachekey, 10);
            } else {
                $dItems = unserialize($redis->get($cachekey));
            }

            if (count($dItems) > 0) {
                $items = array();
                foreach ($dItems as $dItem) {
                    $item = array(
                        'rarity' => $dItem->get_item_class()->get_css_quality_class(),
                        'from' => $dItem->get_from(),
                        'image' => $dItem->get_image(),
                        'name' => $dItem->get_name(),
                        'price' => $dItem->get_price(),
                        'source_img' => $dItem->get_source_image(),
                        'source_img_alt' => $dItem->get_source_image_alt(),
                        'source_css_class' => $dItem->get_source_css_class(),
                        'source_link' => $dItem->get_source_link(),
                        'date' => $dItem->get_time_drop(),
                    );
                    array_push($items, $item);
                }
                $json['success'] = true;
                $json['items'] = $items;
            }
        }
    }
    echo_json($json);
}

function opencase_depositusrhistory() {
    $json = array('success' => false, 'not_deposit' => true);
    if (rate_limit_check(getip(), 'getdeposusrvhist', 4, 5) == false) {
        api_check_csrf();
        $user = user();
        if ($user->get_id() != '' && $user->is_login()) {
            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $cachekey = "deposihistvr".user()->get_id();

            $deposithistusrv = '';

            if (!$redis->get($cachekey)) {
                $deposithistusrv = db()->query('SELECT * FROM opencase_deposite WHERE user_id = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" ORDER BY id DESC');
                $redis->set($cachekey, serialize($deposithistusrv));
                $redis->expire($cachekey, 10);
            } else {
                $deposithistusrv = unserialize($redis->get($cachekey));
            }

            $json['deposithist'] = array();

            foreach ($deposithistusrv as $item) {
                array_push($json['deposithist'], array(
                    'amount' => $item['sum'],
                    'method' => $item['num'],
                    'status' => $item['status'],
                    'date' => $item['time_add']
                ));
            }
            $json['success'] = true;
        }else{
            $json['error_code'] = 'No authorized.';
            $json['not_deposit'] = false;
        }
    }else{
        $json['error_code'] = 'Rate limit. Please try again later';
        $json['not_deposit'] = false;
    }
    echo_json($json);
}

function opencase_selltohistory() {
    $json = array('success' => false, 'not_items' => true);
        if (rate_limit_check(getip(), 'getselltohistory', 4, 5) == false) {
                    api_check_csrf();
                    $user = user();
                    if ($user->get_id() != '' && $user->is_login()) {
                        $redis = new Redis();
                        $redis->connect('127.0.0.1', 6379);

                        $cachekey = "selltohistrq".user()->get_id();

                        $nftsellto = '';

                        if (!$redis->get($cachekey)) {
                            $nftsellto = db()->query('SELECT * FROM crypto_withdrawals WHERE userid = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" ORDER BY id DESC');
                            $redis->set($cachekey, serialize($nftsellto));
                            $redis->expire($cachekey, 10);
                        } else {
                            $nftsellto = unserialize($redis->get($cachekey));
                        }

                        $json['nfts'] = array();

                        foreach ($nftsellto as $item) {
                            $droppedItem = new droppedItem($item['droppednft']);
                            array_push($json['nfts'], array(
                                'image' => $droppedItem->get_image(),
                                'name' => $droppedItem->get_name(),
                                'total' => $item['amount'],
                                'fee' => $item['fee'],
                                'address' => $item['address'],
                                'network' => $item['method'],
                                'status' => $item['status'],
                                'txid' => $item['txid'],
                                'datereq' => $item['datereq']
                            ));
                        }
                        $json['success'] = true;
                    }else{
                        $json['error_code'] = 'No authorized.';
                        $json['not_items'] = false;
                    }
                }else{
                    $json['error_code'] = 'Rate limit. Please try again later';
                    $json['not_items'] = false;
                }
    echo_json($json);
}

function opencase_nftwithdlist() {
    $json = array('success' => false, 'not_items' => true);
    if (rate_limit_check(getip(), 'getnftwithdlist', 4, 5) == false) {
        api_check_csrf();
        $user = user();
        if ($user->get_id() != '' && $user->is_login()) {
            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $cachekey = "nftwithdlistrnq".user()->get_id();

            $nftsellto = '';

            if (!$redis->get($cachekey)) {
                $nftsellto = db()->query('SELECT * FROM nft_withdrawals WHERE userid = "' . safeescapestring(db()->nomysqlinj($user->get_id())) . '" ORDER BY id DESC');
                $redis->set($cachekey, serialize($nftsellto));
                $redis->expire($cachekey, 10);
            } else {
                $nftsellto = unserialize($redis->get($cachekey));
            }

            $json['nfts'] = array();

            foreach ($nftsellto as $item) {
                $droppedItem = new droppedItem($item['droppedid']);
                array_push($json['nfts'], array(
                    'image' => $droppedItem->get_image(),
                    'name' => $droppedItem->get_name(),
                    'address' => $item['address'],
                    'network' => $item['network'],
                    'status' => $item['status'],
                    'txid' => $item['txid'],
                    'datereq' => $item['timesent']
                ));
            }
            $json['success'] = true;
        }else{
            $json['error_code'] = 'No authorized.';
            $json['not_items'] = false;
        }
    }else{
        $json['error_code'] = 'Rate limit. Please try again later';
        $json['not_items'] = false;
    }
    echo_json($json);
}

function opencase_usepromocode() {
	$json = ['success' => false];
	$user = user();
	if ($user->get_id() != '' && $user->is_login()) {
        if (rate_limit_check(getip(), 'usepromocode', 2, 5) == false) {
            api_check_csrf();
            $userloggexfh = user();
            if (!is_locked_user($userloggexfh)) {
                lock_user($userloggexfh);
                if (isset($_POST['code']) && $_POST['code'] != '') {
                    if (!preg_match('/[^a-zA-Z0-9]+/', $_POST['code'])) {
                        if (strlen($_POST['code']) <= 60) {
                            $promo = new promocode();
                            $promo->get_from_code(safeescapestring(strip_tags(trim($_POST['code']))));
                            if ($promo->get_code() != '' && $promo->get_enable() && $promo->get_type() == promocode::TYPE_SUM) {
                                if ($promo->user_can_use($user->get_id())) {
                                    if ($promo->get_use() < $promo->get_count()) {
                                        $promo->use_promocode($user->get_id());
                                        if ($promo->get_value() > 0) {
                                            $promoSum = $promo->get_value();
                                            $json['msg'] = 'Promotion code successfully activated. +$' . $promoSum . '';
                                            $json['balance'] = $promoSum;
                                            inc_user_balance($user, $promoSum);
                                            add_balance_log($user->get_id(), $promoSum, 'Bonus for using a promo code in the amount of: ' . $promo->get_code(), 5);
                                        }
                                        $json['success'] = true;
                                    } else {
                                        $json['error'] = 'Promotion code has already been activated the maximum number of times';
                                    }
                                } else {
                                    $json['error'] = 'You have already used this code';
                                }
                            } else {
                                $json['error'] = 'There is no such promo code';
                            }
                        } else {
                            $json['error'] = 'Invalid promo code';
                        }
                    }
                } else {
                    $json['error'] = 'You did not enter a promo code';
                }
                unlock_user($userloggexfh);
            } else {
                $json['error'] = 'You cannot perform this action because another action is currently in progress';
            }
        }else{
            $json['error'] = 'Rate limit. Please try again later';
        }
	} else {
		$json['error'] = 'You are not logged in';
	}
	echo_json($json);
}

function opencase_multiply_open($args) {
	$timeStart = microtime(true);
	$user = user();
	$json = array('success' => false);
	$ncaseid = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($ncaseid) <= 50) {
        $case = new ocase(safeescapestring(strip_tags(trim($args[0]))));
        if ($case->get_id() != '') {
                if ($user->get_id() != '' && $user->is_login()) {
                    if (rate_limit_check(getip(), 'multiplyopen', 2, 5) == false) {
                        api_check_csrf();
                        if (!is_locked_user($user)) {
                            lock_user($user);
                            $caseCount = 1;
                            if ($case->is_available() && $case->allow_open_case_num($caseCount)) {
                                if ($user->get_data('solana_wallet') != '') {
                                    if ($user->get_data('eth_wallet') != '') {
                                        if (get_setval('opencase_enablecases') == 1) {
                                            if ($case->get_type() == ocase::TYPE_DEFAULT) {
                                                if ($case->get_price() > 0) {
                                                    $totalPrice = 0;
                                                    $userBalance = get_user_balance($user);
                                                    $enabledItems = db()->query('select * from opencase_itemincase where case_id = "' . safeescapestring(db()->nomysqlinj($case->get_id())) . '" and (count_items = -1 or count_items > 0) and enabled = 1 and chance > 0 order by chance DESC');
                                                    $totalChance = (float)($user->get_data('chance') / 100) * (float)($case->get_chance() / 100);
                                                    $checkItemsPrice = $case->get_price();
                                                    $items = [];
                                                    $otherItems = [];
                                                    $currentitatpc = 0;
                                                    foreach ($enabledItems as $item) {
                                                        $tmpItem = new item($item['item_id']);
                                                        $itemChanse = $item['chance'];
                                                        if ($tmpItem->get_status() == 1) {
                                                            $currentitatpc += $tmpItem->get_price()*$item['chance'];
                                                            if ($tmpItem->get_price() <= $checkItemsPrice) {
                                                                if ($totalChance > 0) {
                                                                    $itemChanse /= $totalChance;
                                                                }
                                                            } else {
                                                                if ($totalChance <= 0) {
                                                                    $otherItems[$item['id']] = array('itemincase_id' => $item['id'], 'count_items' => $item['count_items'], 'name' => $tmpItem->get_name(), 'chance' => $itemChanse, 'item_id' => $item['item_id'], 'withdrawable' => $item['withdrawable'], 'usable' => $item['usable'], 'image' => $tmpItem->get_image(), 'rarity' => $item['rarity'], 'quality' => $tmpItem->get_quality(), 'price' => $tmpItem->get_price(), 'network' => $tmpItem->get_network(), 'mintaddress' => $tmpItem->get_mintaddress(), 'date' => $tmpItem->get_date(), 'tranche' => $tmpItem->get_tranche());
                                                                    continue;
                                                                }
                                                                $itemChanse *= $totalChance;
                                                            }
                                                            $items[$item['id']] = array('itemincase_id' => $item['id'], 'count_items' => $item['count_items'], 'name' => $tmpItem->get_name(), 'chance' => $itemChanse, 'item_id' => $item['item_id'], 'withdrawable' => $item['withdrawable'], 'usable' => $item['usable'], 'image' => $tmpItem->get_image(), 'rarity' => $item['rarity'], 'quality' => $tmpItem->get_quality(), 'price' => $tmpItem->get_price(), 'network' => $tmpItem->get_network(), 'mintaddress' => $tmpItem->get_mintaddress(), 'date' => $tmpItem->get_date(), 'tranche' => $tmpItem->get_tranche());
                                                        }
                                                    }
                                                    if (empty($items)) {
                                                        $items = $otherItems;
                                                    }
                                                    if (count($items) > 0) {
                                                        $result = [];
                                                        for ($countKey = 0; $countKey < $caseCount; $countKey++) {
                                                            if (count($items) > 0) {
                                                                //$casePrice = $case->get_final_price();
                                                                $casePrice = round($currentitatpc/82, 2); //100-82 = 18% house edge
                                                                $totalPrice += $casePrice;
                                                                if ($userBalance >= $totalPrice) {
                                                                    $haveItems = [];
                                                                    foreach ($items as $item) {
                                                                        $haveItems[] = $item;
                                                                    }
                                                                    $item = false;
                                                                    if (empty($haveItems)) {
                                                                        $haveItems = $items;
                                                                        usort($haveItems, 'sortItemByPrice');
                                                                        $item = array_shift($haveItems);
                                                                    } else {
                                                                        $sum = 0;
                                                                        foreach ($haveItems as $key => $hItem) {
                                                                            $sum += $hItem['chance'];
                                                                        }
                                                                        $chance = rand(0, $sum - 1);
                                                                        $i = 0;
                                                                        foreach ($haveItems as $hItem) {
                                                                            if ($chance >= $i && $chance < $i + (int)$hItem['chance']) {
                                                                                $item = $hItem;
                                                                                break;
                                                                            }
                                                                            $i += (int)$hItem['chance'];
                                                                        }
                                                                    }
                                                                    if ($item) {
                                                                        if ($items[$item['itemincase_id']]['count_items'] > 0) {
                                                                            $items[$item['itemincase_id']]['count_items']--;
                                                                            if ($items[$item['itemincase_id']]['count_items'] == 0) {
                                                                                unset($items[$item['itemincase_id']]);
                                                                            }
                                                                        }
                                                                        $result[] = [
                                                                            'item' => $item,
                                                                            'price' => $casePrice
                                                                        ];
                                                                    } else {
                                                                        $json['error'] = 'An error occurred when opening the case, try again later';
                                                                        break;
                                                                    }
                                                                } else {
                                                                    $json['error'] = 'You do not have enough funds to open this case';
                                                                    break;
                                                                }
                                                            } else {
                                                                $json['error'] = 'An error occurred when opening the case, try again later';
                                                                break;
                                                            }
                                                        }
                                                        if (!empty($result)) {
                                                            $json['items'] = [];
                                                            foreach ($result as $res) {
                                                                $item = $res['item'];
                                                                $itemPrice = round($item['price']);

                                                                if($item['network'] == "sol"){
                                                                    $client = new GuzzleHttp\Client();
                                                                    $request = $client->request('GET', 'api-mainnet.magiceden.dev/v2/tokens/'.$item['mintaddress']);

                                                                    $response = @json_decode($request->getBody());
                                                                    $stat = $request->getStatusCode();

                                                                    $request2 = $client->request('GET', 'api-mainnet.magiceden.dev/v2/tokens/'.$item['mintaddress'].'/listings/');

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
                                                                                        $item['name'] = $response->name;
                                                                                        $imgrep1 = str_replace('https://arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://arweave.net/', $response->image);
                                                                                        $imgrep2 = str_replace('https://www.arweave.net/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.arweave.net/', $imgrep1);
                                                                                        $imgrep3 = str_replace('https://ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://ipfs.io/', $imgrep2);
                                                                                        $imgrep4 = str_replace('https://www.ipfs.io/', 'https://img-cdn.magiceden.dev/rs:fill:640:640:0:0/plain/https://www.ipfs.io/', $imgrep3);
                                                                                        $item['image'] = $imgrep4;
                                                                                        $itemPrice = $solnftprice;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }else{
                                                                        $json['error'] = 'An error occurred when opening the case, try again later';
                                                                        break;
                                                                    }
                                                                }
                                                                if($item['network'] == "eth"){

                                                                }

                                                                dec_user_balance($user, $res['price']);
                                                                add_balance_log($user->get_id(), -$res['price'], 'Opening the case №' . $case->get_id() . ' (' . $case->get_name() . ')', 1);


                                                                $dItem = new droppedItem();
                                                                if ($item['item_id'] == 15694) {
                                                                    $dItem->set_parametrs('', $user->get_id(), $item['item_id'], 5, $item['rarity'], $itemPrice, '', 3, $case->get_id(), 0, 0, 0, '', $item['withdrawable'], $item['usable'], '', $item['name'], $item['image'], $item['network'], $item['mintaddress'], '', $res['price']);
                                                                } else {
                                                                    $dItem->set_parametrs('', $user->get_id(), $item['item_id'], 5, $item['rarity'], $itemPrice, '', 0, $case->get_id(), 0, 0, 0, '', $item['withdrawable'], $item['usable'], '', $item['name'], $item['image'], $item['network'], $item['mintaddress'], '', $res['price']);
                                                                }
                                                                //function set_parametrs( $id, $user_id, $item_id, $quality, $rarity, $price, $time_drop, $status, $from, $fast, $offer_id, $bot_id, $error = '', $withdrawable = 1, $usable = 1, $analog_id = null, $name = null, $image = null, $network = null, $mintaddress = null, $publicid = null, $caseprice = null) {
                                                                $time = $dItem->add_droppedItem();
                                                                $itemID = $dItem->get_id();
                                                                $openCase = new openCase();
                                                                $openCase->set_parametrs('', $user->get_id(), $case->get_id(), $itemID, $res['price'], '');
                                                                $openCase->add_openCase();
                                                                $itemincase = new itemincase($item['itemincase_id']);
                                                                if ($itemincase->get_count_items() > 0) {
                                                                    $itemincase->set_count_items($itemincase->get_count_items() - 1);
                                                                    $itemincase->update_itemincase();
                                                                }
                                                                if ($item['item_id'] == 15694) {
                                                                    inc_user_balance($user, 100);
                                                                    add_balance_log($user->get_id(), 100, 'Opening the case №' . $case->get_id() . ' (' . $case->get_name() . ') BalanceOnSite', 1);
                                                                }
                                                                inc_user_exp($user, $res['price']*100);

                                                                if ($item['item_id'] != 15694) {
                                                                    $setitemstat = new item($item['item_id']);
                                                                    $setitemstat->set_status(2);
                                                                    $setitemstat->update_item();
                                                                }

                                                                $json['items'][] = ['ID' => $itemID, 'name' => $item['name'], 'shortName' => $item['name'], 'quality' => $item['quality'] ?? '', 'image' => $item['image'], 'chance' => $item['chance'], 'price' => $itemPrice, 'rarity' => $item['rarity'] ?? '', 'usable' => ((bool)$item['usable'])];
                                                                centrifugo::sendItem($dItem, $time);
                                                            }
                                                            $case->set_open_count($case->get_open_count() + $caseCount);
                                                            $case->update_ocase();
                                                            update_setval('opencase_count_open_case', get_setval('opencase_count_open_case') + $caseCount);
                                                            centrifugo::sendStats();
                                                            $json['success'] = true;
                                                            $json['balance'] = get_user_balance($user);
                                                            $json['exp'] = get_user_exp($user);
                                                        }
                                                    } else {
                                                        $json['error'] = 'An error occurred when opening the case, try again later';
                                                    }
                                                } else {
                                                    $json['error'] = 'At the moment, this case is not available';
                                                }
                                            } else {
                                                $json['error'] = 'This case can only be opened once';
                                            }
                                        } else {
                                            $json['error'] = 'Opening mystery boxes is temporary disabled.';
                                        }
                                    } else {
                                        $json['error'] = 'You need to set up your Ethereum wallet address, to receive NFT.';
                                    }
                                } else {
                                    $json['error'] = 'You need to set up your Solana wallet address, to receive NFT.';
                                }
                            } else {
                                $json['error'] = 'At the moment, this case is not available';
                            }
                            unlock_user($user);
                        } else {
                            $json['error'] = 'You cannot perform this action because another action is currently in progress';
                        }
                    }else{
                        $json['error'] = 'Rate limit. Please try again later';
                    }
                } else {
                    $json['error'] = 'You are not logged in';
                }
        } else {
            $json['error'] = 'There is no such case';
        }
    }else{
        $json['error'] = 'There is no such case';
    }
	$timeEnd = microtime(true);
	$json['speed'] = $timeEnd - $timeStart;
	echo_json($json);
}