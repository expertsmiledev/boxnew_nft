<?php

//add_post('/api/request/battle/boxes/', 'opencase_battle_cases_list_new');
//add_post('/api/request/battle/new/([0-9]+)/', 'opencase_battle_create');
//add_post('/api/request/battle/join/([0-9]+)/', 'opencase_battle_join');
//add_post('/api/request/battle/([0-9]+)/', 'opencase_battle_info');
//add_post('/api/request/battle/info/([0-9]+)/', 'opencase_battle_check');
//add_post('/api/request/battle/cancel/([0-9]+)/', 'opencase_battle_cancel');
//add_post('/api/request/battle/member/', 'opencase_getuserbattles');
//REMOVE COMMENT TO ENABLE BATTLES

function api_check_csrfbattle() {
    if (!empty($csrfkey = $_SERVER['HTTP_X_CSRF_TOKEN'])) {
        if ($csrfkey == $_SESSION['csrftokenn']) {
            return;
        }
    }
    header_error(401);

    $json = ['success' => false, 'error' => 'Invalid request. Please try again'];
    echo_json($json);
}

function opencase_battle_cases_list_new() {
    $json = ['success' => false];
    if (rate_limit_check(getip(), 'battlecslnew', 5, 5) == false) {
        api_check_csrfbattle();
        $json = ['success' => true, 'battles' => []];

        if (is_login()) {
            $json['userStats'] = get_user_count_battles(user());
        }
        $json['stats'] = get_count_battles();
        $json['lastBattle'] = get_last_battle();
        $json['battles'] = battle::getActiveBattlesNewest();
    }
    echo_json($json);
}

function opencase_battle_create($args) {
	$caseId = (int) $args[0];
	$caseId = safeescapestring(strip_tags(trim($caseId)));
	$json = ['success' => false];
    if(strlen($caseId) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $caseId)) {
            if (rate_limit_check(getip(), 'battlecreate', 2, 5) == false) {
                api_check_csrfbattle();
                $user = user();
                if ($user->get_id() != '' && $user->is_login()) {
                    if (!is_locked_user($user)) {
                        lock_user($user);
                        if (get_setval('opencase_enablebattle') == 1) {
                            if (battle::isAvailForBattleCase($caseId)) {
                                $battle = new battle();
                                $battle->setCreatorId($user->get_id());
                                $battle->setCaseId($caseId);
                                if ($battle->getPrice() > 0) {
                                    if ($battle->getPrice() <= get_user_balance($user)) {
                                        $battle->save();
                                        $json['success'] = true;
                                        $json['id'] = $battle->getId();
                                        battleCentrifugo::updateBattlesList();
                                    } else {
                                        $json['error'] = 'You dont have enough balance';
                                    }
                                } else {
                                    $json['error'] = 'An error occurred while creating a battle';
                                }
                            } else {
                                $json['error'] = 'An error occurred while creating a battle';
                            }
                        } else {
                            $json['error'] = 'Battles are temporary disabled';
                        }
                        unlock_user($user);
                    } else {
                        $json['error'] = 'You cannot perform this action because another action is currently in progress';
                    }
                } else {
                    $json['error'] = 'You are not logged in';
                }
            }else{
                $json['error'] = 'Rate limit. Please try again later';
            }
        } else {
            $json['error'] = 'Invalid data';
        }
    }else{
        $json['error'] = 'Invalid data';
    }
	echo_json($json);
}

function opencase_battle_join($args) {
    $json = ['success' => false];
    $battleId = (int) $args[0];
	$battleId = safeescapestring(strip_tags(trim($battleId)));
    if(strlen($battleId) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $battleId)) {
            if (rate_limit_check(getip(), 'battlejoin', 2, 5) == false) {
                api_check_csrfbattle();
                $user = user();
                if ($user->get_id() != '' && $user->is_login()) {
                    $battle = battle::getActiveBattleByBattleId($battleId, $user->get_id());
                    if (!is_null($battle)) {
                        if (!is_locked_user($user)) {
                            lock_user($user);
                            if (get_setval('opencase_enablebattle') == 1) {
                                if ($battle->getCreatorId() != $user->get_id()) {
                                    if (get_user_balance($user) >= $battle->getPrice()) {
                                        $battle->addParticipant($user);
                                        $json['success'] = true;
                                        $json['id'] = $battle->getId();
                                        battleCentrifugo::updateBattlesList();
                                        battleCentrifugo::updateBattleStatus($battle);
                                    } else {
                                        $json['error'] = 'You dont have enough balance';
                                    }
                                } else {
                                    $json['success'] = true;
                                    $json['id'] = $battle->getId();
                                }
                            } else {
                                $json['error'] = 'Battles are temporary disabled';
                            }
                            unlock_user($user);
                        } else {
                            $json['error'] = 'You cannot perform this action because another action is currently in progress';
                        }
                    } else {
                        $json['error'] = 'Failed to find an active battle';
                    }
                } else {
                    $json['error'] = 'You are not logged in';
                }
            }else{
                $json['error'] = 'Rate limit. Please try again later';
            }
        } else {
            $json['error'] = 'Invalid data';
        }
    }else{
        $json['error'] = 'Invalid data';
    }
	echo_json($json);
}

function opencase_battle_info($args) {
	$json = ['success' => false];
	$btlid = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($btlid) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $btlid)) {
            if (rate_limit_check(getip(), 'battleinfo', 4, 5) == false) {
                api_check_csrfbattle();
                $battle = new battle($btlid);
                if ($battle->getId() != '' && $battle->getStatus() != battle::STATUS_CANCEL) {
                    $case = $battle->getCase();
                    $json['battle'] = [
                        'id' => $battle->getId(),
                        'creator' => $battle->getUserData($battle->getCreator()),
                        'participant' => $battle->getUserData($battle->getParticipant()),
                        'case' => [
                            'caseId' => $case->get_id(),
                            'key' => $case->get_key(),
                            'name' => $case->get_name(),
                            'image' => $case->get_src_image(),
                            'items' => $battle->getItemsInCase()
                        ],
                        'status' => $battle->getStatus(),
                        'price' => $battle->getPrice(),
                        'winnerId' => $battle->getWinnerId()
                    ];
                    if ($battle->getStatus() == battle::STATUS_PROGRESS) {
                        $result = $battle->getAdditional();
                        if ($result) {
                            $json['result'] = $result;
                        }
                    }
                    $json['success'] = true;
                }
            }
        }
    }
	echo_json($json);
}

function opencase_battle_check($args) {
	$json = ['success' => false];
    $btlid = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($btlid) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $btlid)) {
            if (rate_limit_check(getip(), 'battlecheck', 4, 5) == false) {
                api_check_csrfbattle();
                $battle = new battle($btlid);
                if ($battle->getId() != '') {
                    $json['creator'] = $battle->getUserData($battle->getCreator());
                    $json['participant'] = $battle->getUserData($battle->getParticipant());
                    $status = $battle->getStatus();
                    $json['status'] = $status;
                    if ($status == battle::STATUS_PROGRESS) {
                        $result = $battle->getAdditional();
                        if ($result) {
                            $json['result'] = $result;
                        }
                        $json['winnerId'] = $battle->getWinnerId();
                    }
                    $json['success'] = true;
                } else {
                    $json['error'] = 'Battle doesnt exist';
                }
            }else{
                $json['error'] = 'Rate limit. Please try again later';
            }
        }
    }
	echo_json($json);
}

function opencase_battle_cancel($args) {
	$json = ['success' => false];
    $btlid = safeescapestring(strip_tags(trim($args[0])));
    if(strlen($btlid) <= 50) {
        if (!preg_match('/[^a-zA-Z0-9]+/', $btlid)) {
            if (rate_limit_check(getip(), 'battlecancel', 2, 5) == false) {
                api_check_csrfbattle();
                $battle = new battle($btlid);
                if ($battle->getId() != '') {
                    $user = user();
                    if ($user->get_id() != '' && $user->is_login()) {
                        $userloggexfh = user();
                        if (!is_locked_user($userloggexfh)) {
                            lock_user($userloggexfh);
                            if ($battle->getStatus() == battle::STATUS_WAITING) {
                                if ($user->get_id() == $battle->getCreatorId()) {
                                    if (get_setval('opencase_enablebattle') == 1) {
                                        $battle->cancelGame();
                                        $json['success'] = true;
                                        battleCentrifugo::updateBattlesList();
                                        battleCentrifugo::updateBattleStatus($battle);
                                    } else {
                                        $json['error'] = 'Battles are temporary disabled';
                                    }
                                } else {
                                    $json['error'] = 'You cant cancel battle you didnt create';
                                }
                            } else {
                                $json['error'] = 'This battle has already been started';
                            }
                            unlock_user($userloggexfh);
                        } else {
                            $json['error'] = 'You cannot perform this action because another action is currently in progress';
                        }
                    } else {
                        $json['error'] = 'You are not logged in';
                    }
                } else {
                    $json['error'] = 'Battle doesnt exist';
                }
            }else{
                $json['error'] = 'Rate limit. Please try again later';
            }
        }
    }
	echo_json($json);
}

function opencase_getuserbattles() {
	$json = array('success' => false, 'not_items' => true);
	if (isset($_POST['page']) && isset($_POST['user_id'])) {
        if(strlen($_POST['page']) <= 50) {
            if(strlen($_POST['user_id']) <= 50) {
                if (!preg_match('/[^a-zA-Z0-9]+/', $_POST['page'])) {
                    if (!preg_match('/[^a-zA-Z0-9]+/', $_POST['user_id'])) {
                        if (rate_limit_check(getip(), 'getusrbattles', 5, 5) == false) {
                            api_check_csrfbattle();
                            $userId = safeescapestring(strip_tags(trim($_POST['user_id'])));
                            $userId = (int)$userId;
                            $countPerPage = 8;
                            $battles = battle::getBattles('status = ' . battle::STATUS_FINISHED . ' AND (creator_id = "' . $userId . '" OR participant_id = "' . $userId . '")', '', (((int)$_POST['page']) * $countPerPage) . ', ' . $countPerPage);
                            if (count($battles) > 0) {
                                $battlesData = [];
                                foreach ($battles as $battle) {
                                    $case = $battle->getCase();
                                    $battlesData[] = [
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
                                if (count($battles) >= $countPerPage) {
                                    $json['not_items'] = false;
                                }
                                $json['success'] = true;
                                $json['items'] = $battlesData;
                            } else {
                                $json['error_code'] = 'Not items';
                            }
                        }else{
                            $json['error_code'] = 'Rate limit. Please try again later';
                            $json['not_items'] = false;
                        }
                    }
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
