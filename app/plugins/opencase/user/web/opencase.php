<?php

add_app('/case/([^\/]+)/', 'user_case');
add_app('/leaderboard/', 'user_top');

function user_case($args) {
	set_content('');
	set_title('Case');
	set_title_page('Case');
	set_tpl('case.php');
	add_data('case_name', isset($args[0]) ? $args[0] : '');
}

function user_top($args) {
	set_content('');
	set_title('Leaderboard');
	set_title_page('Leaderboard');
	set_tpl('top.php');
}

