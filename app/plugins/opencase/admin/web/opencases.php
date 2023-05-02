<?php

add_admin_get('/opencase/opencases/(([0-9]+)/)?', 'admin_opencase_opencases');

function admin_opencase_opencases($args) {
	$page = isset($args[1]) ? $args[1] : 1;
	$casecount = db()->query_once('select count(id) from opencase_droppeditems');
	$pages = new Pages();
	$pages->set_num_object($casecount['count(id)']);
	$pages->set_object_in_page(get_settings()->get_setting_value('admin_in_page'));
	$pages->set_format_url(ADMINURL . '/opencase/opencases/{p}/');
	$pages->set_first_url(ADMINURL . '/opencase/opencases/');
	$pages->set_curent_page($page);
	$openCase = new droppedItem();
	$allcases = $openCase->get_droppedItems('', 'id DESC', (($page - 1) * get_setval('admin_in_page')) . ',' . get_setval('admin_in_page'));
	$content = '
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table class = "table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>User</th>
									<th>Mystery Box</th>
									<th>NFT Won</th>
									<th>NFT Dropped Price</th>
									<th>Box Price</th>
									<th>Our Profit</th>
									<th>Time</th>
									<th>Status</th>
								</tr>
							</thead>
								
							<tbody>
					';
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
					<td><a href = "' .ADMINURL . '/opencase/user/' . $value->get_user_id() . '/">' . $value->get_user_class()->get_name() . '</a></td>
					<td><a href = "' .ADMINURL . '/opencase/caseitems/' . $value->get_from() . '/">' . $value->get_from() . '</a></td>
					<td>' . $value->get_name() . '</td>
					<td>' . $value->get_price() . ' €</td>
					<td>' . $value->get_caseprice() . ' €</td>
					<td><span class = "label ' . $label_class . '">' . (floatval($value->get_caseprice())-floatval($value->get_price())) . ' €</span></td>
					<td>' . $value->get_time_drop() . '</td>
					<td>' . $value->get_status() . '</td>
				</tr>
			';
	}
	$content .= '
							</tbody>
						</table>
					</div>
					<div class = "box-footer">
						<ul class="pagination pagination-sm no-margin pull-right">' . $pages->get_html_pages() . '</ul>
					</div>
				</div>
			</div>
		</div>
		';
	set_active_admin_menu('opencaseopencases');
	set_title('Drops');
	set_content($content);
	set_tpl('index.php');
}
