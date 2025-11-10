<?php 
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
$tpl = new MyTemplate();

$start_year = $_GET['start_year']?$_GET['start_year']:date("Y",strtotime("-1 month"));
$start_month = $_GET['start_month']?$_GET['start_month']:date("n",strtotime("-1 month"));
$start_day = $_GET['start_day']?$_GET['start_day']:date("j",strtotime("-1 month"));
$end_year = $_GET['end_year']?$_GET['end_year']:date("Y");
$end_month = $_GET['end_month']?$_GET['end_month']:date("n");
$end_day = $_GET['end_day']?$_GET['end_day']:date("j");


//アクセスcsvデータ取得
$file = fopen(SERVICE_PATH.'holoholo_access_log.csv','r');
while($data = fgetcsv($file)){
	mb_convert_variables('UTF-8', 'SJIS', $data);//ファイルがSJISなら
	$raw[] = $data;
}
fclose($file);

//csvデータのキーに名前をつける
foreach($raw as $key=>$val){
	if($val[1]!='122.213.201.14'){
		$csv_data[$key]['date'] = $val[0];
		$csv_data[$key]['ip'] = $val[1];
		$csv_data[$key]['url'] = $val[2];
	}
}

$start_date = !empty($start_year) && !empty($start_month) && !empty($start_day)?sprintf("%04d-%02d-%02d", $start_year, $start_month, $start_day):date("Y-m-d",strtotime("-1 month"));
$end_date = !empty($end_year) && !empty($end_month) && !empty($end_day)?sprintf("%04d-%02d-%02d", $end_year, $end_month, $end_day):date('Y-m-d');
$include = $_GET['include'];
$exclude = $_GET['exclude'];
$filtered_data = filterData($csv_data, $start_date, $end_date, $include, $exclude);

// 各キーごとに頻度を計算し、値と回数のペアを生成
$record_summary = array();
foreach (['date', 'ip', 'url'] as $key) {
	$summary_sum[$key]['key_sum'] = 0;
	$counts = countValues($filtered_data, $key);
	arsort($counts); // 降順でソート
	$record_summary[$key] = array();
	foreach ($counts as $value => $count) {
		$record_summary[$key][] = array("value" => $value, "count" => $count);
		$summary_sum[$key]['key_sum']++;
	}
	$summary_sum[$key]['average'] = number_format(count($filtered_data)/$summary_sum[$key]['key_sum'],1);
}

$tpl->start_year = $start_year;
$tpl->start_month = $start_month;
$tpl->start_day = $start_day;
$tpl->start_date = $start_date;
$tpl->end_year = $end_year;
$tpl->end_month = $end_month;
$tpl->end_day = $end_day;
$tpl->end_date = $end_date;
$tpl->include = $include;
$tpl->exclude = $exclude;
$tpl->raw = $filtered_data;
$tpl->record_summary = $record_summary;
$tpl->summary_sum = $summary_sum;
$tpl->show(SERVICE_PATH.'template/pv.php');