<?php

add_admin_menu('opencase_plugin_promo_menu');

function opencase_plugin_promo_menu() {
	return array(
		'key' => 'promomain',
		'icon' => 'fa-diamond',
		'name' => 'Promo Codes',
		'position' => 3.4,
		'menu' => array(
			array(
				'key' => 'promo',
				'icon' => 'fa-diamond',
				'url' => ADMINURL . '/promo/',
				'text' => 'List'
			),
			array(
				'key' => 'promoadd',
				'icon' => 'fa-plus',
				'url' => ADMINURL . '/promo/addform/',
				'text' => 'Add Promo Code'
			),
			array(
				'key' => 'promosettings',
				'icon' => 'fa-wrench',
				'url' => ADMINURL . '/promo/settings/',
				'text' => 'Settings'
			)
		)
	);
}
