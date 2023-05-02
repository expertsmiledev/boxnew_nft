<?php

add_admin_menu('opencase_plugin_users_menu');

function opencase_plugin_users_menu() {
	return array(
		'key' => 'usersmain',
		'icon' => 'fa-users',
		'name' => 'Users',
		'position' => 3.3,
		'menu' => array(
			array(
				'key' => 'users',
				'icon' => 'fa-users',
				'url' => ADMINURL . '/opencase/users/',
				'text' => 'Users List'
			),
			array(
				'key' => 'usersearch',
				'icon' => 'fa-search',
				'url' => ADMINURL . '/opencase/usersearch/',
				'text' => 'Search User'
			)
		)
	);
}
