<?php

class centrifugo {

	const URL = 'https://smirnoffonbahamas.vip:8443/api';
	const API_KEY = '529a287d-6827-430b-a273-26d521a5dd32';
	const ENABLED = true;

	protected static $instance = null;

	protected static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new CentrifugoClient(self::URL, self::API_KEY);
		}
		return self::$instance;
	}

	public static function sendItem($dItem, $time = 0) {
		if (!self::ENABLED) {
			return;
		}
		try {
			$json = [
				'items' => [
					[
						'id' => $dItem->get_id(),
						'rarity' => $dItem->get_text_rarity(),
						'from' => $dItem->get_from(),
						'image' => $dItem->get_image(),
						'name' => $dItem->get_name(),
						'time' => $dItem->get_time_drop(),
						'price' => $dItem->get_price(),
						'user_id' => $dItem->get_user_class()->get_publicid(),
						'user_img' => $dItem->get_user_class()->get_data('image'),
						'user_name' => $dItem->get_user_class()->get_name(),
						'source_img' => $dItem->get_source_image(),
						'source_img_alt' => $dItem->get_source_image_alt(),
						'source_css_class' => $dItem->get_source_css_class(),
						'source_link' => $dItem->get_source_link(),
						'waittime' => $time
					]
				],
				'success' => true
			];
			self::getInstance()->publish("glob:addDroppedItem", $json);
		} catch (\Exception $ex) {
			
		}
	}

	public static function sendStats() {
		if (!self::ENABLED) {
			return;
		}
		try {
            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $cachekey = "sendstatsch";

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
                $redis->expire($cachekey, 10);
            } else {
                $json = unserialize($redis->get($cachekey));
            }

			$json = array_merge($json, stats::getAdditionalStatsArray());
			self::getInstance()->publish("glob:updateStats", $json);
		} catch (\Exception $ex) {
			
		}
	}

    public static function messageSystem($uid,$message,$message2,$type) {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true,
                'type' => $type,
                'message' => $message,
                'message2' => $message2
            );
            self::getInstance()->publish("glob:messageSystem".$uid, $json);
        } catch (\Exception $ex) {

        }
    }

    public static function deleteMessage($messageId) {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true,
                'message_id' => $messageId
            );
            self::getInstance()->publish("glob:deleteMessage", $json);
        } catch (\Exception $ex) {

        }
    }

    public static function chatMessage($uid,$message,$username,$userexp,$useravatar,$chatid,$modpower) {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true,
                'user_id' => $uid,
                'message' => $message,
                'username' => $username,
                'userexp' => $userexp,
                'useravatar' => $useravatar,
                'id' => $chatid,
                'modpower' => $modpower
            );
            self::getInstance()->publish("glob:chatMessage", $json);
        } catch (\Exception $ex) {

        }
    }

    public static function updateBalance($uid,$balance) {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true,
                'balance' => $balance
            );
            self::getInstance()->publish("glob:updateBalance".$uid, $json);
        } catch (\Exception $ex) {

        }
    }

    public static function rainOn() {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true
            );
            self::getInstance()->publish("glob:rainOn", $json);
        } catch (\Exception $ex) {

        }
    }

    public static function rainOff() {
        if (!self::ENABLED) {
            return;
        }
        try {
            $json = array(
                'success' => true
            );
            self::getInstance()->publish("glob:rainOff", $json);
        } catch (\Exception $ex) {

        }
    }

    public static function getOnline(){
        if (!self::ENABLED) {
            return;
        }
        try {
            return self::getInstance()->info();
        } catch (\Exception $ex) {

        }
    }
}
