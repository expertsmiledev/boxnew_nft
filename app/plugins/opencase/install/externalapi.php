<?php

add_installer('opencase', 'opencase_externalapi_install');
add_uninstaller('opencase', 'opencase_externalapi_uninstall');

function opencase_externalapi_install() {
	add_setval('api_scretkey', 'a249524u463yAk012xavaf', 'Secret key for API', 'text');
}

function opencase_externalapi_uninstall() {
	delete_setval('api_scretkey');
}