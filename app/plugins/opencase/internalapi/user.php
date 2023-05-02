<?php
use Mailgun\Mailgun;

add_post('/api/member/', 'opencase_get_current_user');
add_post('/api/member/profile/(([^\/]+)/)?', 'opencase_get_user_profile');
add_post('/api/member/leaderboard/', 'opencase_get_users_top');
//add_post('/api/member/leaderboard/nftsopen/', 'opencase_get_users_top_by_drop');
add_post('/api/member/register/', 'opencase_register');
add_post('/api/member/login/', 'opencase_login');
add_post('/api/member/reset/pass/', 'opencase_reset_password');
add_post('/api/member/reset/setnew/', 'opencase_reset_passwordfinal');

function api_check_csrfuser() {
    if (!empty($csrfkey = $_SERVER['HTTP_X_CSRF_TOKEN'])) {
        if ($csrfkey == $_SESSION['csrftokenn']) {
            return;
        }
    }
    header_error(401);

    $json = ['success' => false, 'error' => 'Invalid request. Please try again'];
    echo_json($json);
}

function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

function generate_jwt($headers, $payload, $secret = 'secret') {
    $headers_encoded = base64url_encode(json_encode($headers));

    $payload_encoded = base64url_encode(json_encode($payload));

    $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
    $signature_encoded = base64url_encode($signature);

    $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";

    return $jwt;
}

function opencase_get_current_user() {
    $json = ["success" => false];
    if (rate_limit_check(getip(), 'getcurrentuser', 5, 1) == false) {
        //api_check_csrfuser();
        $user = user();
        $uidsub = "";
        if ($user->is_login()) {
            $uidsub = "" . $user->get_id();
        }

        $headers = array('alg' => 'HS256', 'typ' => 'JWT');
        $payload = array('sub' => $uidsub, 'info' => "" . getip() . "" . get_useragentstriped());

        $jwt = generate_jwt($headers, $payload, '94cdc160-d8f0-47b1-baf8-89319f865fbc');


        $json = [
            'success' => true,
            'user' => [
                'login' => $user->is_login(),
                'id' => $user->get_id(),
                'name' => $user->get_name(),
                'image' => $user->get_data('image'),
                'ethwallet' => $user->get_data('eth_wallet'),
                'seed' => $user->get_data('seed'),
                'steamId' => $user->get_data('steam_id'),
                'ismod' => $user->get_data('is_mod'),
                'publicid' => $user->get_publicid(),
                'balance' => get_user_balance($user),
                'exp' => get_user_exp($user),
                'jwtc' => $jwt
            ]
        ];
    }else{
        $json['err'] = 'ratelimit';
    }
	echo_json($json);
}

function opencase_get_avail_user_drop() {
	$json = ['success' => false];
    if (rate_limit_check(getip(), 'getavudrop', 5, 5) == false) {
        api_check_csrfuser();
        if (is_login()) {
            $json['success'] = true;
            $json['items'] = [];
            $items = get_user_drops(user()->get_id(), 'usable = 1 AND (status = 0 OR status = 6)', 0, 0);
            foreach ($items as $item) {
                $json['items'][] = [
                    'id' => $item->get_id(),
                    'price' => $item->get_price(),
                    'name' => $item->get_name(),
                    'image' => $item->get_image(),
                    'imageAlt' => $item->get_item_class()->get_name(),
                    'rarity' => $item->get_item_class()->get_css_quality_class(),
                ];
            }
        }
    }
	echo_json($json);
}

function opencase_register(){
    $json = [
        'success' => false,
        'error' => 'Error, please try again'
    ];

    if (empty($_POST['username_register'])) {
        $json = ['success' => false, 'error' => 'No username provided'];
    }
    if (empty($_POST['email_register'])) {
        $json = ['success' => false, 'error' => 'No email provided'];
    }
    if (empty($_POST['password_register'])) {
        $json = ['success' => false, 'error' => 'No password provided'];
    }
    if (empty($_POST['recaptch_register_resp'])) {
        $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
    }

    if (!is_login()) {
        $usernameregister = safeescapestring(strip_tags(trim($_POST['username_register'])));
        $passwordregister = strip_tags(trim($_POST['password_register']));
        $passwordregister = str_replace("%","", $passwordregister);
        $passwordregister = str_replace("_", "", $passwordregister);
        $emailregister = safeescapestring(strip_tags(trim($_POST['email_register'])));
        $recaptcharesponse = ($_POST['recaptch_register_resp']);

        if (!empty($usernameregister) && !empty($emailregister) && !empty($passwordregister) && !empty($recaptcharesponse)) {
            if (!preg_match('/[^a-zA-Z0-9]+/', $usernameregister)) {
                    if(strlen($passwordregister) >= 5) {
                        if(strlen($passwordregister) <= 30) {
                            if(strlen($usernameregister) >= 4) {
                                if(strlen($usernameregister) <= 22) {
                                    if (strlen($emailregister) >= 6) {
                                        if (strlen($emailregister) <= 40) {
                                            if (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emailregister)) {
                                                if (rate_limit_check(getip(), 'register', 2, 5) == false) {
                                                    api_check_csrfuser();
                                                    $recaptcha = new \ReCaptcha\ReCaptcha("6Ldp-NcfAAAAALHExY7k-DgjbIX03v0xVZOUp7xW");
                                                    $resprecaptcha = $recaptcha->setExpectedHostname('smirnoffonbahamas.vip')
                                                        ->verify($recaptcharesponse, getip());
                                                    if ($resprecaptcha->isSuccess()) {
                                                        $loviasite = "site";
                                                        $data = db()->query_once('SELECT * FROM users WHERE name = "' . safeescapestring(db()->nomysqlinj($usernameregister)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($loviasite)) . '"');
                                                        if (empty($data)) {
                                                            $data2 = db()->query_once('SELECT * FROM users WHERE email = "' . safeescapestring(db()->nomysqlinj($emailregister)) . '"');
                                                            if (empty($data2)) {
                                                                $adk2 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                                                $adk3 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                                                $key = md5($adk3 . bin2hex(random_bytes(10)) . $adk2);
                                                                $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                                                $key = md5($key . $addKey);

                                                                $publicidrandom = bin2hex(random_bytes(7)) . "" . bin2hex(random_bytes(7));
                                                                $seedrandom = bin2hex(random_bytes(7));
                                                                $ownrefcoderandom = bin2hex(random_bytes(8));

                                                                $authuser = new user();
                                                                $authuser->set_name(mysqli_real_escape_string(db()->db, db()->nomysqlinj($usernameregister)));
                                                                $authuser->set_nohash_password(mysqli_real_escape_string(db()->db, db()->nomysqlinj($passwordregister)));
                                                                $authuser->set_email(mysqli_real_escape_string(db()->db, db()->nomysqlinj($emailregister)));
                                                                $authuser->set_login_via("site");
                                                                $authuser->set_emailconfirmkey(safeescapestring(db()->nomysqlinj($key)));
                                                                $authuser->set_publicid($publicidrandom);
                                                                $authuser->add();

                                                                $authuser->set_data('seed', $seedrandom);
                                                                $authuser->set_data('steam_id', 'NoSteamID');
                                                                $authuser->set_data('image', 'https://api.multiavatar.com/' . safeescapestring(db()->nomysqlinj($usernameregister)) . '.png');//default avatar
                                                                $authuser->set_data('timecreated', time());
                                                                $authuser->set_data('own_ref_code', $ownrefcoderandom);
                                                                $authuser->update();
                                                                add_log($authuser->get_id(), 'registration');
                                                                update_setval('opencase_count_users', get_setval('opencase_count_users') + 1);
                                                                centrifugo::sendStats();

                                                                $mg = Mailgun::create('ba60548dda7bd93486e3d21e9fdea0fd-100b5c8d-7bc992ce');
                                                                $domain = "sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org";
                                                                $mg->messages()->send($domain, [
                                                                    'from' => 'Mailgun Sandbox <postmaster@sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org>',
                                                                    'to' => $authuser->get_email(),
                                                                    'subject' => 'Website - Email confirmation',
                                                                    'text' => 'Confirm your email address by visiting: https://website.com/?emverify=' . $authuser->get_emailconfirmkey() .''
                                                                ]);

                                                                $json = [
                                                                    'success' => true,
                                                                    'message' => 'Account created successfully'
                                                                ];
                                                                $authuser->set_auth_cookie();
                                                            } else {
                                                                $json = ['success' => false, 'error' => 'Email already in use'];
                                                            }
                                                        } else {
                                                            $json = ['success' => false, 'error' => 'Username taken'];
                                                        }
                                                    }else{
                                                        $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
                                                    }
                                                }else{
                                                    $json = ['success' => false, 'error' => 'Rate limit. Please try again'];
                                                }
                                            } else {
                                                $json = ['success' => false, 'error' => 'Invalid email address'];
                                            }
                                        }else{
                                            $json = ['success' => false, 'error' => 'Email needs to have maximum 40 chars'];
                                        }
                                    } else {
                                        $json = ['success' => false, 'error' => 'Email needs to have minimum 6 chars'];
                                    }
                                }else{
                                    $json = ['success' => false, 'error' => 'Username needs to have maximum 22 chars'];
                                }
                            }else{
                                $json = ['success' => false, 'error' => 'Username needs to have minimum 4 chars'];
                            }
                        }else{
                            $json = ['success' => false, 'error' => 'Password needs to have maximum 30 chars'];
                        }
                    }else{
                        $json = ['success' => false, 'error' => 'Password needs to have minimum 5 chars'];
                    }
            }else{
                $json = ['success' => false, 'error' => 'Username cant contain special characeters'];
            }
        }
    }else{
        $json = ['success' => false, 'error' => 'You are already logged in'];
    }
    echo_json($json);
}

function opencase_login(){
    $json = [
        'success' => false,
        'error' => 'Error, please try again'
    ];

    if (empty($_POST['email_login'])) {
        $json = ['success' => false, 'error' => 'No email provided'];
    }
    if (empty($_POST['password_login'])) {
        $json = ['success' => false, 'error' => 'No password provided'];
    }
    if (empty($_POST['recaptch_login_resp'])) {
        $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
    }

    if (!is_login()) {
        if (!empty($_POST['email_login']) && !empty($_POST['password_login'])) {
            $emaillogin = safeescapestring(strip_tags(trim($_POST['email_login'])));
            $passwordlogin = strip_tags(trim($_POST['password_login']));
            $passwordloginplain = strip_tags(trim($_POST['password_login']));
            $passwordlogin = str_replace("%", "", $passwordlogin);
            $passwordlogin = str_replace("_", "", $passwordlogin);
            $passwordloginplain = str_replace("%", "", $passwordloginplain);
            $passwordloginplain = str_replace("_", "", $passwordloginplain);
            $recaptcharesponse = ($_POST['recaptch_login_resp']);
            if(!empty($emaillogin) && !empty($passwordlogin) && !empty($recaptcharesponse)) {
                if(strlen($passwordlogin) >= 5) {
                    if(strlen($passwordlogin) <= 30) {
                                if (strlen($emaillogin) >= 6) {
                                    if (strlen($emaillogin) <= 40) {
                                        if (rate_limit_check(getip(), 'login', 2, 5) == false) {
                                            api_check_csrfuser();
                                            $recaptcha = new \ReCaptcha\ReCaptcha("6Ldp-NcfAAAAALHExY7k-DgjbIX03v0xVZOUp7xW");
                                            $resprecaptcha = $recaptcha->setExpectedHostname('smirnoffonbahamas.vip')
                                                ->verify($recaptcharesponse, getip());
                                            if ($resprecaptcha->isSuccess()) {
                                                $passwordlogin = md5(sha1(sha1(md5(md5(sha1(md5('USER' . ':' . CMSSECRET . ':' . $passwordlogin)))))));
                                                if (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emaillogin)) {
                                                    $loviasite = "site";
                                                    $data = db()->query_once('SELECT * FROM users WHERE email = "' . safeescapestring(db()->nomysqlinj($emaillogin)) . '" AND password = "' . (db()->nomysqlinj($passwordlogin)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($loviasite)) . '" AND banned = 0');
                                                    if (!empty($data)) {
                                                        $authuser = new user();
                                                        $authuser->login($emaillogin, db()->nomysqlinj($passwordloginplain));
                                                        $json = ['success' => true, 'message' => 'Logged in successfully'];
                                                    } else {
                                                        $json = ['success' => false, 'error' => 'Invalid credentials'];
                                                    }
                                                } else {
                                                    $json = ['success' => false, 'error' => 'Invalid email address'];
                                                }
                                            }else{
                                                $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
                                            }
                                        }else{
                                            $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                                        }
                                    }else{
                                        $json = ['success' => false, 'error' => 'Email needs to have maximum 40 chars'];
                                    }
                                } else {
                                    $json = ['success' => false, 'error' => 'Email needs to have minimum 6 chars'];
                                }
                    }else{
                        $json = ['success' => false, 'error' => 'Password needs to have maximum 30 chars'];
                    }
                }else{
                    $json = ['success' => false, 'error' => 'Password needs to have minimum 5 chars'];
                }
            }else{
                $json = ['success' => false, 'error' => 'Invalid credentials'];
            }
        }
    }else{
        $json = ['success' => false, 'error' => 'You are logged in already'];
    }
    echo_json($json);
}

function opencase_reset_password(){
    $json = [
        'success' => false,
        'error' => 'Error, please try again'
    ];

    if (empty($_POST['email_resetpass'])) {
        $json = ['success' => false, 'error' => 'No email provided'];
    }
    if (empty($_POST['recaptch_resetp_resp'])) {
        $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
    }
    $recaptcharesponse = ($_POST['recaptch_resetp_resp']);

    if (!is_login()) {
        if (!empty($_POST['email_resetpass']) && !empty($_POST['recaptch_resetp_resp'])){
            $emailresetpass = safeescapestring(strip_tags(trim($_POST['email_resetpass'])));
            if (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emailresetpass)) {
                if (rate_limit_check(getip(), 'resetpassword', 1, 5) == false) {
                    api_check_csrfuser();
                    $loviasite = "site";
                    if (!empty($emailresetpass)) {
                        if (strlen($emailresetpass) >= 6) {
                            if (strlen($emailresetpass) <= 40) {
                                $recaptcha = new \ReCaptcha\ReCaptcha("6Ldp-NcfAAAAALHExY7k-DgjbIX03v0xVZOUp7xW");
                                $resprecaptcha = $recaptcha->setExpectedHostname('smirnoffonbahamas.vip')
                                    ->verify($recaptcharesponse, getip());
                                if ($resprecaptcha->isSuccess()) {
                                    $data = db()->query_once('SELECT * FROM users WHERE email = "' . safeescapestring(db()->nomysqlinj($emailresetpass)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($loviasite)) . '"');
                                    if (!empty($data)) {
                                        $expFormat = mktime(
                                            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
                                        );
                                        $expDate = date("Y-m-d H:i:s", $expFormat);
                                        $adk2 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $adk3 = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $key = md5($adk3 . bin2hex(random_bytes(10)) . $adk2);
                                        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                        $key = md5($key . $addKey);

                                        db()->query_once('INSERT INTO password_reset_temp( `email`, `resetkey`, `expdate`) VALUES ( "' . safeescapestring(db()->nomysqlinj($emailresetpass)) . '", "' . safeescapestring(db()->nomysqlinj($key)) . '", "' . safeescapestring(db()->nomysqlinj($expDate)) . '")');
                                        $mg = Mailgun::create('ba60548dda7bd93486e3d21e9fdea0fd-100b5c8d-7bc992ce');
                                        $domain = "sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org";
                                        $mg->messages()->send($domain, [
                                            'from' => 'Mailgun Sandbox <postmaster@sandbox56e1c3aff5ce442bade05caf2c5c3946.mailgun.org>',
                                            'to' => $emailresetpass,
                                            'subject' => 'Website - Reset password',
                                            'text' => 'Your Smiroffonbahamas password reset code is: ' . $key
                                        ]);
                                        $json = ['success' => true, 'msg' => 'Email with password reset link has been sent'];
                                    } else {
                                        $json = ['success' => false, 'error' => 'No account found with this email address confirmed'];
                                    }
                                }else{
                                    $json = ['success' => false, 'error' => 'Please complete ReCaptcha'];
                                }
                            } else {
                                $json = ['success' => false, 'error' => 'Email needs to have maximum 40 chars'];
                            }
                        } else {
                            $json = ['success' => false, 'error' => 'Email needs to have minimum 6 chars'];
                        }
                    }
                }else{
                    $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                }
            }else{
                $json = ['success' => false, 'error' => 'Invalid email'];
            }
        }
    }else{
        $json = ['success' => false, 'error' => 'You are logged in already'];
    }

    echo_json($json);
}

function opencase_reset_passwordfinal(){
    $json = [
        'success' => false,
        'error' => 'Error, please try again'
    ];

    if (empty($_POST['resetpass_key'])) {
        $json = ['success' => false, 'error' => 'No reset pass key provided'];
    }

    if(empty($_POST['resetnew_password'])){
        $json = ['success' => false, 'error' => 'No new password provided'];
    }

    if(empty($_POST['resetnew_password_confirm'])){
        $json = ['success' => false, 'error' => 'No confirm password provided'];
    }

    if (!empty($_POST['resetpass_key'])) {
        if (!empty($_POST['resetnew_password'])) {
            if (!empty($_POST['resetnew_password_confirm'])) {
                $resetpasskey = safeescapestring(strip_tags(trim($_POST['resetpass_key'])));
                $resetnewpassword = strip_tags(trim($_POST['resetnew_password']));
                $resetnewpassword_confirm = strip_tags(trim($_POST['resetnew_password_confirm']));
                $resetnewpassword = str_replace("%", "", $resetnewpassword);
                $resetnewpassword = str_replace("_", "", $resetnewpassword);
                $resetnewpassword_confirm = str_replace("%", "", $resetnewpassword_confirm);
                $resetnewpassword_confirm = str_replace("_", "", $resetnewpassword_confirm);

                if ($resetnewpassword == $resetnewpassword_confirm) {
                    if(strlen($resetnewpassword) >= 5) {
                        if(strlen($resetnewpassword) <= 30) {
                            if (!is_login()) {
                                if (rate_limit_check(getip(), 'resetpasswfinal', 1, 5) == false) {
                                    api_check_csrfuser();
                                    $data = db()->query_once('SELECT * FROM password_reset_temp WHERE resetkey = "' . safeescapestring(db()->nomysqlinj($resetpasskey)) . '" AND used = 0 LIMIT 1');
                                    if (!empty($data)) {
                                        $useremail = $data['email'];
                                        $lvia = "site";
                                        $data2 = db()->query_once('SELECT * FROM users WHERE email = "' . safeescapestring(db()->nomysqlinj($useremail)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($lvia)) . '" LIMIT 1');
                                        if (!empty($data2)) {
                                            $curDate = date("Y-m-d H:i:s");
                                            if ($data['expdate'] >= $curDate) {
                                                db()->query_once('UPDATE `password_reset_temp` SET `used` = 1 WHERE `id` = "' . safeescapestring(db()->nomysqlinj($data['id'])) . '";');
                                                $newpassword = md5(sha1(sha1(md5(md5(sha1(md5('USER' . ':' . CMSSECRET . ':' . $resetnewpassword)))))));
                                                db()->query_once('UPDATE `users` SET `password` = "' . db()->nomysqlinj($newpassword) . '" WHERE `email` = "' . safeescapestring(db()->nomysqlinj($useremail)) . '" AND login_via = "' . safeescapestring(db()->nomysqlinj($lvia)) . '"');
                                                $useranda = new user(user()->get_id());
                                                $useranda->clear_auth_cookie();
                                                $json = ['success' => true, 'msg' => 'Password has been successfully changed. Please login again.'];
                                            } else {
                                                $json = ['success' => false, 'error' => 'This reset pass key already expired'];
                                            }
                                        } else {
                                            $json = ['success' => false, 'error' => 'Invalid data'];
                                        }
                                    } else {
                                        $json = ['success' => false, 'error' => 'Invalid reset password key'];
                                    }
                                }else{
                                    $json = ['success' => false, 'error' => 'Rate limit. Please try again later'];
                                }
                            } else {
                                $json = ['success' => false, 'error' => 'You are logged in already'];
                            }
                        }else{
                            $json = ['success' => false, 'error' => 'Password needs to have maximum 30 chars'];
                        }
                    }else{
                        $json = ['success' => false, 'error' => 'Password needs to have minimum 5 chars'];
                    }
                }else{
                    $json = ['success' => false, 'error' => 'Password confirmation doesnt match'];
                }
            }
        }
    }
    echo_json($json);
}

function opencase_get_user_profile($args) {
	$json = ['success' => false];
	$publicid = safeescapestring(strip_tags(trim(isset($args[1]) ? $args[1] : '')));
    if (rate_limit_check(getip(), 'getuserprofile', 5, 5) == false) {
        api_check_csrfuser();
        $isOtherUserProfile = true;
        if (is_login() && (empty($publicid) || $publicid == user()->get_publicid())) {
            $user = user();
            $isOtherUserProfile = false;
        } else {
            if (strlen($publicid) <= 40) {
                if (!preg_match('/[^a-zA-Z0-9-]+/', $publicid)) {
                    $user = get_user_by_publicid($publicid);
                }
            }
        }
        if ($user) {
            $json['success'] = true;
            $json['profile'] = [
                'isOther' => $isOtherUserProfile,
                'counts' => [
                    'case' => get_user_count_cases($user),
                ],
                'name' => $user->get_name(),
                'steamId' => $user->get_data('steam_id'),
                'image' => $user->get_data('image'),
                'seed' => $user->get_data('seed'),
                'publicid' => $user->get_publicid(),
                'exp' => $user->get_data('exp'),
                'timeFromReg' => get_user_time_from_reg_text($user),
                'favoriteCase' => false,
                'bestDrop' => false
            ];
            if ($isOtherUserProfile == false) {
                $json['profile']['ethWallet'] = $user->get_data('eth_wallet');
                $json['profile']['solWallet'] = $user->get_data('solana_wallet');
                $json['profile']['email'] = $user->get_email();
                $json['profile']['emailconfirmed'] = $user->get_confirmed_email();
                $json['profile']['loginvia'] = $user->get_login_via();
            }
            $json['profile']['counts'] = array_merge($json['profile']['counts'], stats::addAditionalUserStatsArray($user));
            if (!$isOtherUserProfile) {
                $json['profile']['referral'] = [
                    'count' => get_user_referrals_count(),
                    'percent' => get_user_percent(),
                    'deposit' => get_user_refferals_deposite(),
                    'profit' => get_user_ref_profit(),
                ];
            }
            $case = get_user_favorite_case($user);
            if ($case) {
                $json['profile']['favoriteCase'] = [
                    'id' => $case->get_id(),
                    'name' => $case->get_name(),
                    'rarity' => $case->get_rarity_css(),
                    'key' => $case->get_key(),
                    'sale' => $case->get_total_sale(),
                    'price' => $case->get_price(),
                    'salePrice' => $case->get_sale_price(),
                    'image' => $case->get_src_image(),
                ];
            }
            $bestDrop = get_user_best_drop($user);
            if ($bestDrop) {
                $json['profile']['bestDrop'] = [
                    'id' => $bestDrop->get_id(),
                    'price' => $bestDrop->get_price(),
                    'name' => $bestDrop->get_name(),
                    'image' => $bestDrop->get_image(),
                    'imageAlt' => $bestDrop->get_name(),
                    'rarity' => $bestDrop->get_text_rarity(),
                ];
            }
        }
    }
	echo_json($json);
}

function opencase_get_users_top() {
    $json['success'] = false;
	$limit = 15;
	$page = !empty($_POST['page']) ? ((int) $_POST['page']) : 0;
    if(strlen($page) <= 30) {
        $page = safeescapestring(strip_tags(trim($page)));
        if (!preg_match('/[^a-zA-Z0-9]+/', $page)) {
            if (rate_limit_check(getip(), 'getuserstop', 5, 5) == false) {
                api_check_csrfuser();
                $top = get_top_users($limit, $page);
                $json = [
                    'success' => true,
                    'top' => $top,
                    'hasMore' => count($top) >= $limit
                ];
            }
        }
    }
	echo_json($json);
}

function opencase_get_users_top_by_drop() {
    $json['success'] = false;
	$timeLimit = max((!empty($_POST['timeLimit']) ? ((int) $_POST['timeLimit']) : 0), 0);
	$limit = max(min((!empty($_POST['limit']) ? ((int) $_POST['limit']) : 5), 10), 1);
    $timeLimit = safeescapestring(strip_tags(trim($timeLimit)));
    $limit = safeescapestring(strip_tags(trim($limit)));
    if(strlen($timeLimit) <= 30) {
        if(strlen($limit) <= 30) {
            if (!preg_match('/[^a-zA-Z0-9]+/', $timeLimit)) {
                if (!preg_match('/[^a-zA-Z0-9]+/', $limit)) {
                    if (rate_limit_check(getip(), 'guserstobydr', 5, 5) == false) {
                        api_check_csrfuser();
                        $where = 'time_drop <= NOW()';
                        if ($timeLimit > 0) {
                            $where .= ' AND time_drop >= (DATE_SUB(NOW(), INTERVAL ' . $timeLimit . ' SECOND))';
                        }
                        $dItem = new droppedItem();

                        $redis = new Redis();
                        $redis->connect('127.0.0.1', 6379);

                        $cachekey = "gditm".$where.$limit;

                        $items = '';

                        if (!$redis->get($cachekey)) {
                            $items = $dItem->get_droppedItems($where, 'price DESC', $limit);
                            $redis->set($cachekey, serialize($items));
                            $redis->expire($cachekey, 10);
                        } else {
                            $items = unserialize($redis->get($cachekey));
                        }

                        $json = [
                            'success' => true,
                            'top' => []
                        ];
                        foreach ($items as $item) {
                            $json['top'][] = [
                                'id' => $item->get_id(),
                                'price' => $item->get_price(),
                                'name' => $item->get_name(),
                                'image' => $item->get_image(),
                                'rarity' => $item->get_text_rarity(),
                                'user' => [
                                    'id' => $item->get_user_class()->get_id(),
                                    'name' => $item->get_user_class()->get_name(),
                                    'steam_id' => $item->get_user_class()->get_data('steam_id'),
                                    'publicid' => $item->get_user_class()->get_publicid(),
                                    'image' => $item->get_user_class()->get_data('image')
                                ]
                            ];
                        }
                    }
                }
            }
        }
    }
	echo_json($json);
}
