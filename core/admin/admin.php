<?php 
	$admin_menu = array(
		array(
			'key' => 'constrol',
			'name' => 'Control Panel',
			'position' => 1,
			'icon' => 'fa-dashboard',
			'menu' => array(
				array(
					'key' => 'dashboard',
					'icon' => 'fa-dashboard',
					'url' => ADMINURL.'/dashboard/',
					'text' => 'Dashboard'
				),
				array(
					'icon' => 'fa-sign-in',
					'url' => '/',
					'text' => 'Go to site'
				),
				array(
					'key' => 'settings',
					'icon' => 'fa-wrench',
					'url' => ADMINURL.'/settings/',
					'text' => 'Settings'
				)
			)
		)
	);
	
	set_menu('admin', $admin_menu);
	
	global $admin_dashboard;
	$admin_dashboard = array();
	
	global $admin_navbar;
	$admin_navbar = array();
	
	add_app(ADMINURL.'/', 'index');
	add_app(ADMINURL.'/login/', 'login');
	add_admin_app('/dashboard/', 'dashboard');
	add_admin_app('/settings/', 'settings_page');
	add_admin_app('/settings/edit/', 'settings_edit');
	add_admin_app('/logout/', 'logout');

	function index() {
		if (!is_admin()) {
			clear_cookie('admin_token');
			$content = '<form method = "post" action = "'.ADMINURL.'/login/">Login:<br> <input type = "text" name = "name" value = ""><br> Password: <br><input type = "password" name = "password" value = ""><br><input type = "submit" value = "Вход"></form>';
			set_title('Admin panel');
			set_content($content);
			set_tpl('login.php');
		} else {
			redirect(ADMINURL.'/dashboard/');
		}
	}
	
	function login() { 
		if (!empty($_POST['name']) && !empty($_POST['password'])) { 
			$admin = new admin();
			if ($admin->login(safeescapestring(db()->nomysqlinj($_POST['name'])), safeescapestring(db()->nomysqlinj($_POST['password'])))) {
				set_cookie('admin_token', md5('ADMIN'.$admin->get_id().':'.$admin->get_name().':'.$admin->get_password().':'.get_useragentstriped('ADMIN')));
				redirect(ADMINURL.'/dashboard/');	 
			} else { 
				alertE('Invalid username or password', ADMINURL.'/');
			}
		} else { 
			alertE('Invalid data', ADMINURL.'/');
		}
	}
	
	function dashboard() {
		$content = get_admin_dashboard();
		add_content($content);
		set_active_admin_menu('dashboard');
		set_title('Panel Dashboard');
		set_tpl('index.php');
	}

	function settings_page() {
		$template_select = '';
		foreach(get_files(TPLFOLDER.'/') as $file) {
			if(is_dir(TPLFOLDER.'/'.$file))
				$template_select .= '<option value="'.$file.'"'.($file == get_setval('current_template_folder')? 'selected = "selected"' : '').'>'.$file.'</option>';
		}
		$content = '
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<form method = "post" action = "'.ADMINURL.'/settings/edit/">
							<div class="box-body">
								<div class="form-group">
									<label for="siteurl">Website name: </label>
									<input type = "text" class="form-control" name="site_name" id="site_name" value = "'.get_setval('site_name').'">
								</div>
								<div class="form-group">
									<label for="siteurl">Website email: </label>
									<input type = "text" class="form-control" name="admin_email" id="admin_email" value = "'.get_setval('admin_email').'">
								</div>
							</div>
							<div class = "box-footer">
								<button class="btn btn-success" type="submit"><i class = "fa fa-save"></i> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		';
		set_title('Settings');
		set_content($content);
		set_tpl('index.php');
		set_active_admin_menu('settings');
	}
	
	function settings_edit() {
		foreach ($_POST as $key => $value) {
			get_settings()->update_value($key, $value);
		}
		alertS('Settings have been saved', ADMINURL.'/settings/');
	}

	function logout() {
		clear_cookie('admin_token');
		redirect(ADMINURL . '/');
	}
?>