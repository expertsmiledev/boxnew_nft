<?php

error_reporting(0);

if (true) {
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
}

define('CMSFOLDER', dirname(__FILE__) . '/../');
define('COREFOLDER', CMSFOLDER . '/core');
define('ADMINFOLDER', COREFOLDER . '/admin');
define('SETTINGSFOLDER', COREFOLDER . '/settings');
define('APPFOLDER', CMSFOLDER . '/app');
define('PLUGINFOLDER', APPFOLDER . '/plugins');
define('TPLFOLDER', CMSFOLDER . '/templates');
define('UPLOADFOLDER', CMSFOLDER . '/uploads');
define('ADMINURL', '/g304543cefvh824asnkd02viksz3ih8511la88');
define('UPDATEDOMEIN', 'example.com');
define('CMSSECRET', 'QN93450ASDNI234Nmksadn20NWIavt8a');

require_once(COREFOLDER . '/class/WebSite.php');

$ws = WebSite::get_instance();
$ws->init();
