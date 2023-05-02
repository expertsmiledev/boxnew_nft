<?php

add_installer('opencase', 'opencase_basepages_install');
add_uninstaller('opencase', 'opencase_basepages_uninstall');

function opencase_basepages_install() {
	$data = [
		[
			'namepage' => 'index',
			'title' => 'OpenCase',
			'title_page' => 'OpenCase',
			'meta_des' => "",
			'meta_key' => "",
			'content' => "",
			'nft' => 'index.php',
			'url' => '/'
		]
	];
	foreach ($data as $row) {
		ins('webpage', $row);
	}
}

function opencase_basepages_uninstall() {
	db()->query_once("DELETE FROM `webpage` WHERE `namepage` IN ('index')");
}
