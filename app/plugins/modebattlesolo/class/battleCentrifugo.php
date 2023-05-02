<?php

require_once PLUGINFOLDER . '/opencase/class/centrifugo.php';

class battleCentrifugo extends centrifugo {

	public static function updateBattleStatus($battle) {
		if (!self::ENABLED) {
			return;
		}
		try {
			$json = ['success' => false];
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
			self::getInstance()->publish("glob:uptadeBattle" . $battle->getId(), $json);
		} catch (\Exception $ex) {
			
		}
	}

	public static function updateBattlesList() {
		if (!self::ENABLED) {
			return;
		}
		try {
			$json = ['success' => true, 'battles' => []];
			$json['stats'] = get_count_battles();
			$json['lastBattle'] = get_last_battle();
            $json['battles'] = battle::getActiveBattlesNewest();
			self::getInstance()->publish("glob:uptadeBattleList", $json);
		} catch (\Exception $ex) {
			
		}
	}

}
