<?php

add_admin_menu('admin_menu_opencase_mode_battle');

function admin_menu_opencase_mode_battle() {
	return [
		'key' => 'battlemodemenu',
		'name' => 'Battles',
		'position' => 3.03,
		'icon' => 'fa-gamepad',
		'menu' => [
			[
				'key' => 'battlemode',
				'icon' => 'fa-gamepad',
				'url' => ADMINURL . '/mode/battle/',
				'text' => 'All battles'
			],
			[
				'key' => 'battlemodecases',
				'icon' => 'fa-suitcase',
				'url' => ADMINURL . '/mode/battle/cases/',
				'text' => 'Boxes for battles'
			],
		]
	];
}
