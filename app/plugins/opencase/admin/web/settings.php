<?php

add_admin_get('/opencase/settings/', 'admin_opencase_settings');
add_admin_post('/opencase/settingssave/', 'admin_opencase_settingssave');

function admin_opencase_settings() {
	$content = '
			<div class = "row">
				<div class = "col-xs-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
						</ul>
						<div class="tab-content">
							<div class="active tab-pane" id="settings">
								<form action = "' .ADMINURL . '/opencase/settingssave/" method = "POST">
									<div class = "form-group">
										<label for="opencase_auto_sell">Auto-sale of items:</label>
										<select name = "opencase_auto_sell" id = "opencase_auto_sell" class = "form-control">
											<option value = "0"' . (get_setval('opencase_auto_sell') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_auto_sell') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_auto_sell_time">Time after which items will be automatically sold (in minutes):</label>
										<input type = "text" class="form-control" name="opencase_auto_sell_time" id="opencase_auto_sell_time" value = "' . get_setval('opencase_auto_sell_time') . '">
									</div>
									<div class = "form-group">
										<label for="opencase_enablecases">Opening cases:</label>
										<select name = "opencase_enablecases" id = "opencase_enablecases" class = "form-control">
											<option value = "0"' . (get_setval('opencase_enablecases') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_enablecases') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_enablewithdrawnft">Withdraw NFT:</label>
										<select name = "opencase_enablewithdrawnft" id = "opencase_enablewithdrawnft" class = "form-control">
											<option value = "0"' . (get_setval('opencase_enablewithdrawnft') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_enablewithdrawnft') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_enablewithdrawcrypt">Withdraw Crypto:</label>
										<select name = "opencase_enablewithdrawcrypt" id = "opencase_enablewithdrawcrypt" class = "form-control">
											<option value = "0"' . (get_setval('opencase_enablewithdrawcrypt') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_enablewithdrawcrypt') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_enablechat">Chat:</label>
										<select name = "opencase_enablechat" id = "opencase_enablechat" class = "form-control">
											<option value = "0"' . (get_setval('opencase_enablechat') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_enablechat') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_enablebattle">Battles:</label>
										<select name = "opencase_enablebattle" id = "opencase_enablebattle" class = "form-control">
											<option value = "0"' . (get_setval('opencase_enablebattle') == 0 ? ' selected = "selected"' : '') . '>Disabled</option>
											<option value = "1"' . (get_setval('opencase_enablebattle') == 1 ? ' selected = "selected"' : '') . '>Enabled</option>
										</select>
									</div>
									<div class = "form-group">
										<label for="opencase_announcement">Current announcement:</label>
										<input type = "text" class="form-control" name="opencase_announcement" id="opencase_announcement" value = "' . get_setval('opencase_announcement') . '">
									</div>
									<div class = "form-group">
										<button type = "submit" class = "btn btn-success"><i class = "fa fa-save"></i> Save</button>
									</div>
								</form>
                            </div>
						</div>
					</div>
				</div>
			</div>
		';
	add_css(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.css', 10);
	add_css(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.skinNice.css', 11);
	add_script(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.min.js', 10, 'footer');
	add_jscript(' $(function () {
			
			$("#opencase_global_sale").ionRangeSlider({
			  min: 0,
			  max: 100,
			  type: \'single\',
			  step: 1,
			  postfix: " %",
			  prettify: false,
			  hasGrid: true
			});
			
		});');
	set_active_admin_menu('opencasesettings');
	set_title('Mystery Box Website Settings');
	set_content($content);
	set_tpl('index.php');
}

function admin_opencase_settingssave() {
	$saveAsRust = false;
	$needChangeWithdrowType = false;
	$additionalInfo = '';
	foreach ($_POST as $key => $val) {
		$needItemUpdate = false;
		update_setval($key, $val);
		if ($needItemUpdate) {
			$item = new item();
			$error = '';
		}
	}
	if ($saveAsRust && $needChangeWithdrowType) {
		alertW('Changes saved successfully. ' . $additionalInfo . ' Withdraw type has been changed to only bot because its only available for this game.', ADMINURL . '/opencase/settings/');
	} else {
		alertS('Changes saved successfully. ' . $additionalInfo, ADMINURL . '/opencase/settings/');
	}
}
