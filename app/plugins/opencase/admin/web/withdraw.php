<?php

add_admin_get('/opencase/withdraw/(([0-9]+)/)?', 'admin_opencase_withdraw');

function admin_opencase_withdraw($args) {
	$page = isset($args[1]) ? $args[1] : 1;
	$dropcount = db()->query_once('select count(id) from nft_withdrawals');
	$pages = new Pages();
	$pages->set_num_object($dropcount['count(id)']);
	$pages->set_object_in_page(get_settings()->get_setting_value('admin_in_page'));
	$pages->set_format_url(ADMINURL . '/opencase/withdraw/{p}/');
	$pages->set_first_url(ADMINURL . '/opencase/withdraw/');
	$pages->set_curent_page($page);
	$nftwithdo = new nftwithdrawals();
	$alldItems = $nftwithdo->get_nftwithdrawals('', 'id DESC', (($page - 1) * get_setval('admin_in_page')) . ',' . get_setval('admin_in_page'));
	$content = '
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table class = "table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>User id</th>
									<th>NFT id</th>
									<th>Price</th>
									<th>Address</th>
									<th>Network</th>
									<th>droppedId</th>
									<th>Status</th>
									<th>Txid</th>
									<th>Date</th>
								</tr>
							</thead>
								
							<tbody>
					';
	foreach ($alldItems as $value) {
		$content .= '
				<tr>
					<td>' . $value->get_id() . '</td>
					<td><a href = "' .ADMINURL . '/opencase/user/' . $value->get_userid() . '/">' . $value->get_userid() . '</a></td>
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
					<div class = "box-footer">
						<ul class="pagination pagination-sm no-margin pull-right">' . $pages->get_html_pages() . '</ul>
					</div>
				</div>
			</div>
		</div>
		';
	set_active_admin_menu('opencasewithdraw');
	set_title('NFT Withdraws');
	set_content($content);
	set_tpl('index.php');
}
