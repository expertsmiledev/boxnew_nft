<?php

add_admin_menu('opencase_plugin_main_menu');

function opencase_plugin_main_menu() {
	return array(
		'key' => 'opencasemain',
		'icon' => 'fa-bank',
		'name' => 'Website',
		'position' => 3.01,
		'menu' => array(
			array(
				'key' => 'opencasesettings',
				'icon' => 'fa-wrench',
				'url' => ADMINURL . '/opencase/settings/',
				'text' => 'Settings'
			),
			array(
				'key' => 'opencaseopencases',
				'icon' => 'fa-suitcase',
				'url' => ADMINURL . '/opencase/opencases/',
				'text' => 'Drops'
			),
			array(
				'key' => 'opencasedepoite',
				'icon' => 'fa-money',
				'url' => ADMINURL . '/opencase/deposite/',
				'text' => 'Deposits'
			),
			array(
				'key' => 'opencasewithdraw',
				'icon' => 'fa-ticket',
				'url' => ADMINURL . '/opencase/withdraw/',
				'text' => 'NFT Withdraws'
			),
            array(
                'key' => 'opencasewithdrawcro',
                'icon' => 'fa-ticket',
                'url' => ADMINURL . '/opencase/withdrawcro/',
                'text' => 'Crypto Withdraws'
            )
		)
	);
}
