<?php 
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
require_once('../../parts/log.php');
$tpl = new MyTemplate();


$contents_data = contents_data();
$card_data = card_data();

//新着メニュー
// $contents_data_new = $contents_data;
// array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;


//365日データ
$birthday_data = birthday_data();
//指定日の365日データ
foreach($birthday_data as $key=>$val){
	if($val['month']==$_GET['month']&&$val['day']==$_GET['day']){
		$the_birthday = $val;
		$the_birthday['item_id'] = birthday_item_id()[$the_birthday['item_name']];
	}
}


//相性のいいタロット（誕生日）
foreach ($the_birthday['match'] as $match_item) {
	preg_match('/(\d+)月/', $match_item, $month_match);
	$month = isset($month_match[1]) ? $month_match[1] : '';
	preg_match('/(\d+)日/', $match_item, $day_match);
	$day = isset($day_match[1]) ? $day_match[1] : '';
	foreach($birthday_data as $bithday_item){
		if($month==$bithday_item['month']&&$day==$bithday_item['day']){
			$the_match_card_data[] = $card_data[$bithday_item['card_id']];
			$the_match_birthday[] = ['month'=>$month,'day'=>$day];
		}
	}
}

//metaディス
$meta_des = str_replace('mm月dd日',$_GET['month'].'月'.$_GET['day'].'日',meta_info()['birthday']['result']['description']);

$tpl->the_birthday = $the_birthday;
$tpl->the_match_card_data = $the_match_card_data;
$tpl->the_match_birthday = $the_match_birthday;
$tpl->card_data = card_data();
$tpl->contents_data = $contents_data;
$tpl->contents_data_new = new_contents_data();
$tpl->recommend_data = recommend_data();
$tpl->comment_data = comment_data();
$tpl->popular_data = popular_data();
$tpl->keyword_data = keyword_data();
$tpl->meta_info = meta_info()['birthday']['result'];
$tpl->meta_info['description'] = $meta_des;
$tpl->show(SERVICE_PATH.'template/birthday_result.php');