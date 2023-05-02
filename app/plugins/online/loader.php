<?php

add_loader('online_loader');

function get_user_online_hash() {
	return md5(getip() . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''));
}
