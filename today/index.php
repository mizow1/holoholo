<?php
require_once('../lib/template.php');
require_once('../lib/functions.php');
require_once('../parts/log.php');
$tpl = new MyTemplate();

$card = isset($_GET['card']) ? (int)$_GET['card'] : 1;
if ($card < 1 || $card > 4) {
	$card = 1; // 1～4以外の値のときは1とみなす
}


//今日の運勢
$file = fopen(SERVICE_PATH.'/lib/today.csv','r');
while($data = fgetcsv($file)){
	mb_convert_variables('UTF-8', 'SJIS', $data);
	$a[] = $data;
}

fclose($file);
foreach($a as $key=>$val){
	$today_data[$key]['id'] = $val[0];
	$today_data[$key]['name'] = str_replace('（','<br>（',$val[1]);
	$today_data[$key]['body'] = $val[2];
	$today_data[$key]['message'] = $val[3];
	$today_data[$key]['score'] = $val[4];
}

$seed = intval($_SERVER["REMOTE_ADDR"])+intval(date('Ymd')+intval($card));

mt_srand($seed);
$pattern_id = mt_rand(1,count($today_data)-1);
$today_result = $today_data[$pattern_id];

$contents_data = contents_data();
$card_data = card_data();


//新着メニュー
$contents_data_new = $contents_data;
array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;


//metaキーワード
$meta_keyword = str_replace('mm月dd日',date('n月j日'),meta_info()['today']['keyword']);



$tpl->category_data = category_data();
$tpl->today_result = $today_result;
$tpl->contents_data = $contents_data;
$tpl->comment_data = comment_data();
$tpl->contents_data_new = new_contents_data();
$tpl->recommend_data = recommend_data();
$tpl->keyword_data = keyword_data();
$tpl->popular_data = popular_data();
$tpl->the_card_data = $card_data[$today_result['id']];
$tpl->meta_info = meta_info()['today'];
$tpl->meta_info['keyword'] = $meta_keyword;
$tpl->show(SERVICE_PATH.'template/today.php');