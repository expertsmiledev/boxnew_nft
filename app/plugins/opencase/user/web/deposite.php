<?php

add_app('/deposite/success/', 'deposite_success');
add_app('/deposite/fail/', 'deposite_fail');
add_app('/deposite/waiting/', 'deposite_waiting');

function deposite_success() {
	set_content('Payment successfull');
	set_title('Payment successfull');
	set_title_page('Payment successfull');
	set_tpl('page.php');
}

function deposite_fail() {
	set_content('Payment failed');
	set_title('Payment failed');
	set_title_page('Payment failed');
	set_tpl('page.php');
}

function deposite_waiting() {
	set_content('Waiting for payment confirmation');
	set_title('Waiting for payment confirmation');
	set_title_page('Waiting for payment confirmation');
	set_tpl('page.php');
}