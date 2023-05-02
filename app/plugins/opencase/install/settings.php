<?php

add_installer('opencase', 'opencase_settings_install');
add_uninstaller('opencase', 'opencase_settings_uninstall');

function opencase_settings_install() {
	add_setval('opencase_gameid', '', 'ID игры с которой работает скрипт', 'int');
	add_setval('opencase_count_open_case', '0', 'Количество открытых кейсов', 'int');
	add_setval('opencase_count_users', '0', 'Количество зарегестрированных пользователей', 'int');
	add_setval('opencase_freeopen', '0', 'Бесплатное открытие 6ого кейса', 'int');
	add_setval('opencase_regbalance', '0', 'Стартовый баланс при регистрации', 'float');
	add_setval('opencase_withdraw_type', '0', 'Тип вывода предметов', 'int');
	add_setval('opencase_eur_cost', '80', 'Курс евро в рублях', 'float');
	add_setval('opencase_usd_cost', '70', 'Курс доллара в рублях', 'float');
	add_setval('opencase_auto_sell', '1', 'Автопродажа предметов через время', 'int');
	add_setval('opencase_auto_sell_time', '60', 'Время, через которое предметы будут автоматически проданы(в минутах)', 'int');
	add_setval('opencase_global_sale', '0', 'Дополнительная скидка на все кейсы', 'int');
	add_setval('opencase_deposit_check_day', '1', 'Количество дней за которые считаются Depositы для открытия бесплатных кейсов', 'int');
	add_setval('opencase_price_parser_key', '0', 'Ключ по которому брать цену при обновлении', 'int');
}

function opencase_settings_uninstall() {
	delete_setval('opencase_gameid');
	delete_setval('opencase_count_open_case');
	delete_setval('opencase_count_users');
	delete_setval('opencase_freeopen');
	delete_setval('opencase_regbalance');
	delete_setval('opencase_withdraw_type');
	delete_setval('opencase_eur_cost');
	delete_setval('opencase_usd_cost');
	delete_setval('opencase_auto_sell');
	delete_setval('opencase_auto_sell_time');
	delete_setval('opencase_global_sale');
	delete_setval('opencase_deposit_check_day');
	delete_setval('opencase_price_parser_key');
}
