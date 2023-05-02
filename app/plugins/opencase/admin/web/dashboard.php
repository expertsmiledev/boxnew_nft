<?php

add_admin_dashboard('admin_dashboard_opencase');

function admin_dashboard_opencase() {
	$depositeContent = '
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Deposits</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="deposite-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

	$depositeData = array();
	$depQuery = db()->query('SELECT sum(`sum`) as sm, DATE_FORMAT(`time_add`, \'%Y %m %d\') as dat FROM `opencase_deposite` WHERE status = 1 GROUP BY dat ORDER BY dat DESC LIMIT 30');
	foreach ($depQuery as $dep) {
		$date = explode(' ', $dep['dat']);
		$date = $date[0] . '-' . $date[1] . '-' . $date[2];
		$depositeData[] = '{y: \'' . $date . '\', deposite: ' . $dep['sm'] . '}';
	}
	add_jscript('
			if ($("#deposite-chart").length) {
				var depLine = new Morris.Line({
				  element: \'deposite-chart\',
				  resize: true,
				  data: [
					' . implode(',', $depositeData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'deposite\'],
				  labels: [\'Deposit amount\'],
				  lineColors: [\'#00a65a\'],
				  hideHover: \'auto\'
				});
			}
		');


	$caseOpenContent = '
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cases opened</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="caseopen-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

	$caseData = array();
	$caseQuery = db()->query('SELECT count(`id`) as coun, DATE_FORMAT(`time_drop`, \'%Y %m %d\') as dat FROM `opencase_droppeditems` GROUP BY dat ORDER BY dat DESC LIMIT 30');
	foreach ($caseQuery as $cas) {
		$date = explode(' ', $cas['dat']);
		$date = $date[0] . '-' . $date[1] . '-' . $date[2];
		$caseData[] = '{y: \'' . $date . '\', cases: ' . $cas['coun'] . '}';
	}
	add_jscript('
			if ($("#caseopen-chart").length) {
				var caseLine = new Morris.Line({
				  element: \'caseopen-chart\',
				  resize: true,
				  data: [
					' . implode(',', $caseData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'cases\'],
				  labels: [\'Cases Opened\'],
				  lineColors: [\'#3c8dbc\'],
				  hideHover: \'auto\'
				});
			}
		');

	$withDrowContent = '
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">NFT Withdraws</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="withdraw-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

	$drawData = array();
	$drawQuery = db()->query('SELECT sum(`price`) as sm, count(id) as cn, DATE_FORMAT(`timesent`, \'%Y %m %d\') as dat FROM `nft_withdrawals` GROUP BY dat ORDER BY dat DESC LIMIT 30');
	foreach ($drawQuery as $draw) {
		$date = explode(' ', $draw['dat']);
		$date = $date[0] . '-' . $date[1] . '-' . $date[2];
		$drawData[] = '{y: \'' . $date . '\', sum: ' . $draw['sm'] . ', count: ' . $draw['cn'] . '}';
	}
	add_jscript('
			if ($("#withdraw-chart").length) {
				var drawLine = new Morris.Line({
				  element: \'withdraw-chart\',
				  resize: true,
				  data: [
					' . implode(',', $drawData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'sum\', \'count\'],
				  labels: [\'Sum\', \'Count\'],
				  lineColors: [\'#dd4b39\', \'#ecaa1d\'],
				  hideHover: \'auto\'
				});
			}
		');

    $withDrowCroContent = '
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Crypto Withdraws</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="withdrawcro-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

    $drawCroData = array();
    $drawCroQuery = db()->query('SELECT sum(`amount`) as sm, count(id) as cn, DATE_FORMAT(`datereq`, \'%Y %m %d\') as dat FROM `crypto_withdrawals` GROUP BY dat ORDER BY dat DESC LIMIT 30');
    foreach ($drawCroQuery as $drawcro) {
        $date = explode(' ', $drawcro['dat']);
        $date = $date[0] . '-' . $date[1] . '-' . $date[2];
        $drawCroData[] = '{y: \'' . $date . '\', sum: ' . $drawcro['sm'] . ', count: ' . $drawcro['cn'] . '}';
    }
    add_jscript('
			if ($("#withdrawcro-chart").length) {
				var drawLine = new Morris.Line({
				  element: \'withdrawcro-chart\',
				  resize: true,
				  data: [
					' . implode(',', $drawCroData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'sum\', \'count\'],
				  labels: [\'Sum\', \'Count\'],
				  lineColors: [\'#dd4b39\', \'#ecaa1d\'],
				  hideHover: \'auto\'
				});
			}
		');

	$profitContent = '
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Deposit - Withdraw</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="profit-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

	$profitArray = array();
	$profitData = array();
	foreach ($drawQuery as $draw) {
		$profitArray[$draw['dat']]['draw'] = $draw['sm'];
	}

    foreach ($drawCroQuery as $drawcr) {
        $profitArray[$drawcr['dat']]['drawcro'] = $drawcr['sm'];
    }

	foreach ($depQuery as $dep) {
		$profitArray[$dep['dat']]['dep'] = $dep['sm'];
	}

	$tableData = [];
	foreach ($profitArray as $key => $profit) {
		$date = explode(' ', $key);
		$date = $date[0] . '-' . $date[1] . '-' . $date[2];
		$dep = (isset($profit['dep']) ? $profit['dep'] : 0);
		$draw = (isset($profit['draw']) ? $profit['draw'] : 0);
        $drawcro = (isset($profit['drawcro']) ? $profit['drawcro'] : 0);
		$profitData[] = '{y: \'' . $date . '\', dep: ' . $dep . ', draw: ' . (floatval($draw)+floatval($drawcro)) . ', diff : ' . (floatval($dep) - (floatval($draw)+floatval($drawcro))) . '}';
		$tableData[$date] = ['dep' => $dep, 'draw' => (floatval($draw) + floatval($drawcro))];
	}

	add_jscript('
			if ($("#profit-chart").length) {
				var profitLine = new Morris.Line({
				  element: \'profit-chart\',
				  resize: true,
				  data: [
					' . implode(',', $profitData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'diff\', \'draw\', \'dep\'],
				  labels: [\'Deposit - Withdraw\', \'Withdraw\', \'Deposit\'],
				  lineColors: [\'#3c8dbc\', \'#dd4b39\', \'#00a65a\'],
				  hideHover: \'auto\'
				});
			}
		');


    $realprofitContent = '
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Profit</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="realprofit-chart" style="height: 300px;"></div>
				</div>
			</div>
		';

    $realpData = array();
    $realQuery = db()->query("SELECT sum(`price`) as sm,sum(`caseprice`) as csa, count(id) as cn, DATE_FORMAT(`time_drop`, '%Y %m %d') as dat FROM `opencase_droppeditems` GROUP BY dat ORDER BY dat DESC LIMIT 30");
    foreach ($realQuery as $rlq) {
        $date = explode(' ', $rlq['dat']);
        $date = $date[0] . '-' . $date[1] . '-' . $date[2];
        $realpData[] = '{y: \'' . $date . '\', sum: ' . (floatval($rlq['csa'])-floatval($rlq['sm'])) . ', count: ' . $rlq['cn'] . '}';
    }
    add_jscript('
			if ($("#withdraw-chart").length) {
				var drawLine = new Morris.Line({
				  element: \'realprofit-chart\',
				  resize: true,
				  data: [
					' . implode(',', $realpData) . '
				  ],
				  xkey: \'y\',
				  ykeys: [\'sum\', \'count\'],
				  labels: [\'Profit\', \'Cases Opened\'],
				  lineColors: [\'#dd4b39\', \'#ecaa1d\'],
				  hideHover: \'auto\'
				});
			}
		');
	
	
	$tableContent = '<div class="box">
		<div class="box-body">
			<table class = "table table-bordered table-striped" id="FAQElements">
				<thead>
					<tr>
						<th>Date</th>
						<th>Deposit</th>
						<th>Withdraw</th>
						<th>Deposit - Withdraw</th>
					</tr>
				</thead>';
				foreach ($tableData as $date => $data) {
					$tableContent .= '<tr>
						<td>'.$date.'</td>
						<td>'.$data['dep'].'</td>
						<td>'.$data['draw'].'</td>
						<td>'.($data['dep'] - $data['draw']).'</td>';
				}
			$tableContent .= '<tbody>
				</tbody>
			</table>		
		</div>
	</div>';

	add_css(get_admin_template_folder() . '/plugins/morris/morris.css', 11);
	add_script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js', 10, 'footer');
	add_script(get_admin_template_folder() . '/plugins/morris/morris.min.js', 10, 'footer');

	$dashboard = array(
		'position' => 1,
		'cols' => array(
			array(
				'size' => 'lg-6',
				'class' => '',
				'content' => $depositeContent
			),
			array(
				'size' => 'lg-6',
				'class' => '',
				'content' => $caseOpenContent
			),
			array(
				'size' => 'lg-6',
				'class' => '',
				'content' => $withDrowContent
			),
            array(
                'size' => 'lg-6',
                'class' => '',
                'content' => $withDrowCroContent
            ),
			array(
				'size' => 'lg-6',
				'class' => '',
				'content' => $profitContent
			),
            array(
                'size' => 'lg-6',
                'class' => '',
                'content' => $realprofitContent
            ),
			array(
				'size' => 'lg-12',
				'class' => '',
				'content' => $tableContent
			)
		)
	);
	return $dashboard;
}
