<?php 
require_once('../lib/template.php');
require_once('../lib/functions.php');
require_once('../parts/log.php');
$tpl = new MyTemplate();

//365日データ
$birthday_data = birthday_data();
$card_data = card_data();
//指定月の365日データ
foreach($birthday_data as $val){
	if($val['month']==date('n')&&$val['day']==date('j')){
		$the_birthday_data = $val;
	}
}
$the_birthday_data['card_data'] = $card_data[$the_birthday_data['card_id']];
$tpl->the_birthday_data = $the_birthday_data;

$tpl->meta_info = meta_info()['birthday']['entry'];
$tpl->show(SERVICE_PATH.'template/birthday_entry.php');