<?php

add_admin_get('/opencase/users/(([0-9]+)/)?', 'admin_opencase_users');
add_admin_app('/opencase/usersearch/', 'admin_opencase_usersearch');
add_admin_get('/opencase/user/([0-9]+)/', 'admin_opencase_user');
add_admin_post('/opencase/useradd/', 'admin_opencase_useradd');
add_admin_get('/opencase/usereditform/([0-9]+)/', 'admin_opencase_usereditform');
add_admin_post('/opencase/useredit/([0-9]+)/', 'admin_opencase_useredit');
add_admin_get('/opencase/userdelete/([0-9]+)/', 'admin_opencase_userdelete');

function admin_opencase_users($args) {
	$page = isset($args[1]) ? $args[1] : 1;
	$usercount = db()->query_once('select count(id) from users');
	$pages = new Pages();
	$pages->set_num_object($usercount['count(id)']);
	$pages->set_object_in_page(get_settings()->get_setting_value('admin_in_page'));
	$pages->set_format_url(ADMINURL . '/opencase/users/{p}/');
	$pages->set_first_url(ADMINURL . '/opencase/users/');
	$pages->set_curent_page($page);
	$user = new user();
	$allusers = $user->get_users('', 'id DESC', (($page - 1) * get_setval('admin_in_page')) . ',' . get_setval('admin_in_page'));
	$content = '
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class = "box-header with-border">
						<form action = "' .ADMINURL . '/opencase/usersearch/" method = "POST">
							<div class = "row">
								<div class = "col-md-10">
									<input type = "text" name = "search" value = "" placeholder = "SteamID or username" class = "form-control">
								</div>
								<div class = "col-md-2">
									<button type = "submit" class = "btn btn-primary pull-right"><i class = "fa fa-search"></i> Search</button>
								</div>
							</div>
						</form>
					</div>
					<div class="box-body">
						<table class = "table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Avatar</th>
									<th>Username</th>
									<th>Steam ID</th>
									<th>Balance</th>
									<th>Cases Opened</th>
									<th>Status</th>
									<th>Ban</th>
									<th width = "30px"></th>
									<th width = "30px"></th>
									<th width = "30px"></th>
								</tr>
							</thead>
								
							<tbody>
					';
	foreach ($allusers as $value) {
		$content .= '
				<tr>
					<td>' . $value->get_id() . '</td>
					<td><img src = "' . $value->get_data('image') . '" width = "30px"></td>
					<td>' . $value->get_name() . '</td>
					<td>' . $value->get_data('steam_id') . '</td>
					<td>' . get_user_balance($value) . '</td>
					<td>' . get_user_count_cases($value) . '</td>
					<td>' . get_user_status_text($value) . '</td>
					<td>' . get_user_banned_label($value) . '</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/user/' . $value->get_id() . '/" title="Просмотр"><i class = "fa fa-eye"></i></a>
					</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/usereditform/' . $value->get_id() . '/" title="Edit"><i class = "fa fa-pencil"></i></a>
					</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/userdelete/' . $value->get_id() . '/" title="Удалить"><i class = "fa fa-trash"></i></a>
					</td>
				</tr>
			';
	}
	$content .= '
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		';
	add_script(get_admin_template_folder() . '/plugins/deleteConfirm/deleteConfirm.js', 10, 'footer');
	set_active_admin_menu('users');
	set_title('Users List');
	set_content($content);
	set_tpl('index.php');
}

function admin_opencase_usersearch() {
	if (empty($_POST['search'])) {
		$allusers = [];
	} else {
		$allusers = search_user($_POST['search']);
	}
	$content = '
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class = "box-header with-border">
						<form action = "' .ADMINURL . '/opencase/usersearch/" method = "POST">
							<div class = "row">
								<div class = "col-md-10">
									<input type = "text" name = "search" value = "' . (isset($_POST['search']) ? $_POST['search'] : '') . '" placeholder = "SteamID or username" class = "form-control">
								</div>
								<div class = "col-md-2">
									<button type = "submit" class = "btn btn-primary pull-right"><i class = "fa fa-search"></i> Search</button>
								</div>
							</div>
						</form>
					</div>
					<div class="box-body">
						<table class = "table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Avatar</th>
									<th>Username</th>
									<th>Steam ID</th>
									<th>Balance</th>
									<th>Cases Opened</th>
									<th>Status</th>
									<th>Ban</th>
									<th width = "30px"></th>
									<th width = "30px"></th>
									<th width = "30px"></th>
								</tr>
							</thead>
								
							<tbody>
					';
	foreach ($allusers as $value) {
		$content .= '
				<tr>
					<td>' . $value->get_id() . '</td>
					<td><img src = "' . $value->get_data('image') . '" width = "30px"></td>
					<td>' . $value->get_name() . '</td>
					<td>' . $value->get_data('steam_id') . '</td>
					<td>' . get_user_balance($value) . '</td>
					<td>' . get_user_count_cases($value) . '</td>
					<td>' . get_user_status_text($value) . '</td>
					<td>' . get_user_banned_label($value) . '</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/user/' . $value->get_id() . '/" title="Просмотр"><i class = "fa fa-eye"></i></a>
					</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/usereditform/' . $value->get_id() . '/" title="Edit"><i class = "fa fa-pencil"></i></a>
					</td>
					<td>	
						<a href="' .ADMINURL . '/opencase/userdelete/' . $value->get_id() . '/" title="Удалить"><i class = "fa fa-trash"></i></a>
					</td>
				</tr>
			';
	}
	$content .= '
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		';
	set_active_admin_menu('usersearch');
	set_title('User Search');
	set_content($content);
	set_tpl('index.php');
}

function admin_opencase_user($args) {
	$user = new user($args[0]);
	$content = '
			<div class = "row">
				<div class = "col-md-12">
					<div class = "box">
						<div class = "box-body">
							<div class = "row">
								<div class = "col-md-2">
									<img src = "' . $user->get_data('image') . '" alt = "Avatar" class = "img-responsive" style = "margin: 0 auto; padding: 10px 10%;">
								</div>
								<div class = "col-md-10">
									<div class = "table-responsive">
										<div class = "box-body">
											<table class = "table table-striped">
												<tr>
													<th>Username</th> <td><a href = "https://steamcommunity.com/profiles/' . $user->get_data('steam_id') . '/" target = "_blank">' . $user->get_name() . '</a></td>
												</tr>
												<tr>
													<th>Steam ID</th> <td>' . $user->get_data('steam_id') . '</td>
												</tr>
												<tr>
													<th>Trade link:</th> <td><a href = "' . $user->get_data('trade_link') . '" target = "_blank">' . $user->get_data('trade_link') . '</a></td>
												</tr>
												<tr>
													<th>Balance:</th> <td>' . get_user_balance($user) . '</td>
												</tr>
												<tr>
													<th>Status:</th> <td>' . get_user_status_text($user) . '</td>
												</tr>
												<tr>
													<th>Ban:</th> <td>' . get_user_banned_label($user) . '</td>
												</tr>
												<tr>
													<th>Withdraw disabled:</th> <td>' . ($user->get_data('withdraw_disabled') ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>') . '</td>
												</tr>
												<tr>
													<th>Deposit disabled:</th> <td>' . ($user->get_data('deposite_disabled') ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>') . '</td>
												</tr>
												<tr>
													<th>Leaderboard disabled:</th> <td>' . ($user->get_data('top_disabled') ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>') . '</td>
												</tr>
												<tr>
													<th>Chat ban:</th> <td>' . ($user->get_data('chat_ban') ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>') . '</td>
												</tr>
												<tr>
													<th>Use self profit:</th> <td>' . ($user->get_data('use_self_profit') ? '<span class="label label-danger">Yes</span>' : '<span class="label label-success">No</span>') . '</td>
												</tr>
												<tr>
													<th>Cases opened:</th> <td>' . get_user_count_cases($user) . '</td>
												</tr>
											</table>
										</div>
									</div>
								</div>	
							</div>	
						</div>	
						<div class = "box-footer">
							<a href = "' .ADMINURL . '/opencase/usereditform/' . $user->get_id() . '/" class = "btn btn-success"><i class = "fa fa-pencil"></i> Edit user</a>
						</div>
					</div>
				</div>
			</div>
			<span>
			Last 500 results only for each
            </span>
			<div class = "row">
				<div class = "col-xs-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#opencases" data-toggle="tab">Open cases</a></li>
							<li><a href="#deposites" data-toggle="tab">Deposits</a></li>
							<li><a href="#withdraws" data-toggle="tab">NFT Withdraws</a></li>
							<li><a href="#withdrawscro" data-toggle="tab">Crypto Withdraws</a></li>
							<li><a href="#balancelog" data-toggle="tab">Balance log</a></li>
						</ul>
						<div class="tab-content">
							<div class="active tab-pane" id="opencases">
								<table class = "table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Case</th>
											<th>NFT</th>
											<th>NFT cost</th>
											<th>Case cost</th>
											<th>Our Profit</th>
											<th>Date</th>
											<th>Status</th>
										</tr>
									</thead>
										
									<tbody>
							';
	$openCase = new droppedItem();
	$allcases = $openCase->get_droppedItems('user_id = ' . $user->get_id(), 'id DESC', 500);
	foreach ($allcases as $value) {
		if ((floatval($value->get_caseprice())-floatval($value->get_price())) > 0) {
			$label_class = 'label-success';
		} else if ((floatval($value->get_caseprice())-floatval($value->get_price())) < 0) {
			$label_class = 'label-danger';
		} else {
			$label_class = 'label-warning';
		}
		$content .= '
										<tr>
											<td>' . $value->get_id() . '</td>
											<td><a href = "' .ADMINURL . '/opencase/caseitems/' . $value->get_from() . '/">' . $value->get_from() . '</a></td>
											<td>' . $value->get_name() . '</td>
											<td>' . $value->get_price() . ' €</td>
											<td>' . $value->get_caseprice() . ' €</td>
											<td><span class = "label ' . $label_class . '">' . (floatval($value->get_caseprice())-floatval($value->get_price()))  . ' €</span></td>
											<td>' . $value->get_time_drop() . '</td>
											<td>' . $value->get_status() . '</td>
										</tr>
									';
	}
	$content .= '	
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="deposites">
								<table class = "table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Sum</th>
											<th>Payment method</th>
											<th>Status</th>
											<th>Date</th>
										</tr>
									</thead>
										
									<tbody>
							';
	$deposite = new deposite();
	$alllogs = $deposite->get_deposites('user_id = ' . $user->get_id(), 'id DESC', 500);
	foreach ($alllogs as $value) {
		$content .= '
										<tr>
											<td>' . $value->get_id() . '</td>
											<!--<td><a href = "' .ADMINURL . '/opencase/user/' . $value->get_user_id() . '/">' . $value->get_user_class()->get_name() . '</a></td>-->
											<td>' . $value->get_sum() . ' €</td>
											<td>' . $value->get_num() . '</td>
											<td>' . $value->get_status_label() . '</td>
											<td>' . $value->get_format_time_add() . '</td>
										</tr>
									';
	}
	$content .= '	
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="withdraws">
								<table class = "table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>NFT id</th>
											<th>Address</th>
											<th>Price</th>
											<th>Network</th>
											<th>droppedId</th>
											<th>Status</th>
											<th>Txid</th>
											<th>Date</th>
										</tr>
									</thead>
										
									<tbody>
							';
	$dItem = new nftwithdrawals();
	$nftWithd = $dItem->get_nftwithdrawals('userid = ' . $user->get_id(), 'id DESC', 500);
	foreach ($nftWithd as $value) {
		$content .= '
										<tr>
											<td>' . $value->get_id() . '</td>
											<td>' . $value->get_nftid() . '</td>
											<td>' . $value->get_price() . '€</td>
											<td>' . $value->get_address() . '</td>
											<td>' . $value->get_network() . ' </td>
											<td>' . $value->get_droppedid() . '</td>
											<td>' . $value->get_status() . '</td>
											<td>' . $value->get_txid() . '</td>
											<td>' . $value->get_timesent() . '</td>
										</tr>
									';
	}
    $content .= '	
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="withdrawscro">
								<table class = "table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>droppedId</th>
											<th>Amount</th>
											<th>Address</th>
											<th>Method</th>
											<th>Status</th>
											<th>Txid</th>
											<th>Date requested</th>
										</tr>
									</thead>
										
									<tbody>
							';
    $dItem = new cryptowithdrawals();
    $alldItems = $dItem->get_cryptowithdrawals('userid = ' . $user->get_id(), 'id DESC', 500);
    foreach ($alldItems as $value) {
        $content .= '
										<tr>
											<td>' . $value->get_id() . '</td>
											<td>' . $value->get_droppednft() . '</td>
											<td>' . $value->get_amount() . '</td>
											<td>' . $value->get_address() . ' </td>
											<td>' . $value->get_method() . '</td>
											<td>' . $value->get_status() . '</td>
											<td>' . $value->get_txid() . '</td>
											<td>' . $value->get_datereq() . '</td>
										</tr>
									';
    }
	$content .= '	
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="balancelog">
								<table class = "table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Action</th>
											<th>Change</th>
											<th>Date</th>
											<th>Type</th>
										</tr>
									</thead>
										
									<tbody>
							';
	$balanceLog = new balanceLog();
	$alllogs = $balanceLog->get_balanceLogs('user_id = ' . $user->get_id(), 'id DESC', 500);
	foreach ($alllogs as $value) {
		$content .= '
										<tr>
											<td>' . $value->get_id() . '</td>
											<!--<td><a href = "' .ADMINURL . '/opencase/user/' . $value->get_user_id() . '/">' . $value->get_user_class()->get_name() . '</a></td>-->
											<td>' . $value->get_comment() . '</td>
											<td><span class = "label label-' . ($value->get_change() >= 0 ? 'success' : 'danger') . '">' . $value->get_change() . ' €</span></td>
											<td>' . $value->get_format_time() . '</td>
											<td>' . $value->get_text_type() . '</td>
										</tr>
									';
	}
	$content .= '	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	set_active_admin_menu('users');
	add_breadcrumb('Users List', ADMINURL . '/opencase/users/', 'fa-users');
	set_title('Profile user - ' . $user->get_name());
	set_content($content);
	set_tpl('index.php');
}

function admin_opencase_usereditform($args) {
	$user = new user($args[0]);
	$status = '';
	foreach (get_user_status_array() as $key => $value) {
		$status .= '<option value = "' . $key . '"' . ($key == $user->get_data('status') ? ' selected = "selected"' : '') . '>' . $value . '</option>';
	}
	$content = '
		<div class="row">
			<div class="col-xs-12">
				<div class="box">	
					<form method = "post" action = "' .ADMINURL . '/opencase/useredit/' . $user->get_id() . '/">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Login: </label>
								<input type = "text" class="form-control" name="name" id="name" value = "' . $user->get_name() . '">
							</div>
							<div class="form-group">
								<label for="steam_id">Steam ID: </label>
								<input type = "text" class="form-control" name="steam_id" id="steam_id" value = "' . $user->get_data('steam_id') . '">
							</div>
							<div class="form-group">
								<label for="image">Avatar link: </label>
								<input type = "text" class="form-control" name="image" id="image" value = "' . $user->get_data('image') . '">
							</div>
							<div class="form-group">
								<label for="trade_link">Trade link: </label>
								<input type = "text" class="form-control" name="trade_link" id="trade_link" value = "' . $user->get_data('trade_link') . '">
							</div>
							<div class="form-group">
								<label for="balance">Balance: </label>
								<input type = "text" class="form-control" name="balance" id="balance" value = "' . get_user_balance($user) . '">
							</div>
							<div class="form-group">
								<label for="status">Status: </label>
								<select id = "status" name = "status" class = "form-control">
									' . $status . '
								</select>
							</div>
							<div class="form-group">
								<label for="banned">Ban: </label>
								<select id = "banned" name = "banned" class = "form-control">
									<option value = "0"' . ($user->get_banned() ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_banned() ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label for="withdraw_disabled">Withdraw disabled: </label>
								<select id = "withdraw_disabled" name = "withdraw_disabled" class = "form-control">
									<option value = "0"' . ($user->get_data('withdraw_disabled') ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_data('withdraw_disabled') ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>							
							<div class="form-group">
								<label for="deposite_disabled">Deposit Disabled: </label>
								<select id = "deposite_disabled" name = "deposite_disabled" class = "form-control">
									<option value = "0"' . ($user->get_data('deposite_disabled') ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_data('deposite_disabled') ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label for="top_disabled">Leaderboard disabled: </label>
								<select id = "top_disabled" name = "top_disabled" class = "form-control">
									<option value = "0"' . ($user->get_data('top_disabled') ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_data('top_disabled') ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label for="chat_ban">Chat ban: </label>
								<select id = "chat_ban" name = "chat_ban" class = "form-control">
									<option value = "0"' . ($user->get_data('chat_ban') ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_data('chat_ban') ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label for="use_self_profit">Use self profit: </label>
								<select id = "use_self_profit" name = "use_self_profit" class = "form-control">
									<option value = "0"' . ($user->get_data('use_self_profit') ? '' : ' selected = "selected"') . '>No</option>
									<option value = "1"' . ($user->get_data('use_self_profit') ? ' selected = "selected"' : '') . '>Yes</option>
								</select>
							</div>
							<div class="form-group" id="selfProfitWrap"' . ($user->get_data('use_self_profit') ? '' : ' style="display:none"') . '>
								<label for="self_profit">User self profit: </label>
								<input type = "text" class="form-control" name="self_profit" value="' . $user->get_data('self_profit') . '" id="self_profit">
							</div>
						</div>
						<div class="box-footer">
							<button class="btn btn-success" type="submit"><i class = "fa fa-pencil"></i> Save</button>
							<a href = "' .ADMINURL . '/opencase/user/' . $user->get_id() . '/" class = "btn btn-primary"><i class = "fa fa-eye"></i> Show user</a>
						</div>
					</form>
				</div>
			</div>
		</div>';
	add_css(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.css', 10);
	add_css(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.skinNice.css', 11);
	add_script(get_admin_template_folder() . '/plugins/ionslider/ion.rangeSlider.min.js', 10, 'footer');
	add_jscript(' $(function () {
			$("#chance").ionRangeSlider({
			  min: 0,
			  max: 1500,
			  type: \'single\',
			  step: 1,
			  postfix: " %",
			  prettify: false,
			  hasGrid: true
			});
		});');
	add_jscript(' $(function () {
			$("#use_self_profit").on("change", function() {
				let enable = $(this).val();
				if (enable == 1) {
					$("#selfProfitWrap").show();
				} else {
					$("#selfProfitWrap").hide();
				}
			});
		});');
	set_active_admin_menu('users');
	add_breadcrumb('Users List', ADMINURL . '/opencase/users/', 'fa-users');
	set_title('Edit user');
	set_content($content);
	set_tpl('index.php');
}

function admin_opencase_useredit($args) {
	$user = new user($args[0]);
	if ($_POST['name'] != '' && $_POST['steam_id'] != '' && $_POST['image'] != '') {
		if (get_user_balance($user) != $_POST['balance']) {
			add_balance_log($user->get_id(), ($_POST['balance'] - get_user_balance($user)), 'Изменение баланса администратором', 6);
		}
		$user->set_from_array($_POST);
		$user->set_data('steam_id', $_POST['steam_id']);
		$user->set_data('image', $_POST['image']);
		$user->set_data('timecreated', $_POST['timecreated']);
		$user->set_data('balance', $_POST['balance']);
		$user->set_data('trade_link', $_POST['trade_link']);
		$user->set_data('chance', $_POST['chance']);
		$user->set_data('withdraw_disabled', $_POST['withdraw_disabled']);
		$user->set_data('deposite_disabled', $_POST['deposite_disabled']);
		$user->set_data('top_disabled', $_POST['top_disabled']);
        $user->set_data('chat_ban', $_POST['chat_ban']);
		$user->set_data('use_self_profit', $_POST['use_self_profit']);
		$user->set_data('self_profit', max(0, $_POST['self_profit']));
		$user->set_data('status', $_POST['status']);
		$user->update();
		alertS('Changes saved successfully', ADMINURL . '/opencase/usereditform/' . $user->get_id() . '/');
	} else {
		alertE('Не все поля заполнены', ADMINURL . '/opencase/usereditform/' . $user->get_id() . '/');
	}
}

function admin_opencase_userdelete($args) {
	$user = new user($args[0]);
	$user->delete();
	alertS('User deleted', ADMINURL . '/opencase/users/');
}