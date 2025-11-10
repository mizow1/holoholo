<?php 
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
require_once('../../parts/log.php');
$tpl = new MyTemplate();

//指定月
$month = $_GET['month'];

//365日データ
$birthday_data = birthday_data();

//指定月の365日データ
foreach($birthday_data as $val){
	if($val['month']==$month){
		$the_birthday_data[] = $val;
	}
}

//metaディス
$meta_des = str_replace('mm月',$_GET['month'].'月',meta_info()['birthday']['card']['description']);


$tpl->month = $month;
$tpl->card_data = card_data();
$tpl->the_birthday_data = $the_birthday_data;
$tpl->meta_info = meta_info()['birthday']['card'];
$tpl->meta_info['description'] = $meta_des;
$tpl->show(SERVICE_PATH.'template/birthday_card.php');