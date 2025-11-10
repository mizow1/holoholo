<?php 
session_start();
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
$tpl = new MyTemplate();

if(!$_SESSION['yesno_theme']){
	$_SESSION['yesno_theme'] = 'aisho';
}
$_SESSION['select_id'] = $_GET['select_id'];

$contents_data = contents_data();

//yes no結果データ
$file = fopen(SERVICE_PATH.'lib/yesno.csv','r');
while($data = fgetcsv($file)){
	mb_convert_variables('UTF-8', 'SJIS', $data);
	$tmp[] = $data;
}
fclose($file);
foreach($tmp as $key=>$val){
	if($_SESSION['yesno_theme']==$val[0]){
		$yesno[$key]['theme'] = $val[0];
		$yesno[$key]['theme_group'] = $val[1];
		$yesno[$key]['yesno'] = $val[2];
		$yesno[$key]['card_id'] = $val[3];
		$yesno[$key]['result'] = str_replace('。','。<br>',$val[4]);
	}
}

$seed = intval($_SERVER["REMOTE_ADDR"])+intval(date('Ymd'))+intval($_SESSION['select_id']);

mt_srand($seed);
shuffle($yesno);

$pattern_id = mt_rand(0,count($yesno)-1);
$the_yesno = $yesno[$pattern_id];

$the_theme_name = $the_yesno['theme'];
$the_category_group_name = $the_yesno['theme_group'];
$the_category_contents = theme_recommend_data($the_category_group_name,$the_theme_name)?theme_recommend_data($the_category_group_name,$the_theme_name):theme_recommend_data($the_category_group_name);
if($the_category_contents){
	shuffle($the_category_contents);
	//テキストリンクのおすすめ用
	$recommend_1 = $the_category_contents[0];
}

//ジャンル指定のおすすめ用
shuffle($the_category_contents);

//新着メニュー
// $contents_data_new = $contents_data;
// array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;

$tpl->the_category_contents = $the_category_contents;
$tpl->recommend_1 = $recommend_1;
$tpl->the_yesno = $the_yesno;
$tpl->contents_data = $contents_data;
$tpl->contents_data_new = new_contents_data();
$tpl->comment_data = comment_data();
$tpl->recommend_data = recommend_data();
$tpl->popular_data = popular_data();
$tpl->keyword_data = keyword_data();
$tpl->the_card_data = card_data()[$the_yesno['card_id']];
$tpl->meta_info['description'] = mb_substr(strip_tags($the_yesno['result']), 0, 70, 'UTF-8').'…';
$tpl->meta_info['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
$tpl->show(SERVICE_PATH.'template/yesno_result.php');