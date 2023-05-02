<?php

add_installer('opencase', 'opencase_ref_install');
add_uninstaller('opencase', 'opencase_ref_uninstall');

function opencase_ref_install() {
	db()->query_once('
			CREATE TABLE IF NOT EXISTS `referral_user` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `referrer_id` int(11) NOT NULL,
			  `referral_id` int(11) NOT NULL,
			  PRIMARY KEY (`id`),
			  KEY `referrer_id` (`referrer_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;');
	add_setval('ref_referral_rewards', '5', 'Вознаграждение нового пользователя, пришедшего по реферальной ссылке', 'int');
	add_setval('ref_referrer_rewards', '0', 'Вознаграждение реферера за привлечение нового пользователя', 'int');
	add_setval('ref_referrer_rewards_from_deposite', '5', 'Вознаграждение реферера при Depositе реферала (%)', 'int');
	add_setval('ref_referral_min_lvl', '1', 'Минимальный уровень Steam для получения реферального вознаграждения', 'int');
}

function opencase_ref_uninstall() {
	db()->query_once('DROP TABLE IF EXISTS `referral_user`');
	delete_setval('ref_referral_rewards');
	delete_setval('ref_referrer_rewards');
	delete_setval('ref_referrer_rewards_from_deposite');
	delete_setval('ref_referral_min_lvl');
}
