<?php 
require_once('../lib/template.php');
require_once('../lib/functions.php');
require_once('../parts/log.php');
$tpl = new MyTemplate();

$the_category_group_name = explode('/',$_SERVER['REQUEST_URI'])[2];


$category_group_tmp = category_group_data();
foreach($category_group_tmp as $val){
	$category_group_data[$val['name_e']] = $val;
	$category_group_data_id[$val['category_group_id']]=$val;//カテゴリーデータにカテゴリーグループ名を含めるための配列
}

$category_tmp = category_data();
foreach($category_tmp as $val){
	$category_data[$val['name_e']] = $val;
	$category_data[$val['name_e']]['category_group_name']=$category_group_data_id[$val['category_group_id']]['name'];
	$category_data[$val['name_e']]['category_group_name_e']=$category_group_data_id[$val['category_group_id']]['name_e'];
}

$contents_data = contents_data();

//公開済みメニューが存在するカテゴリーリスト
foreach($contents_data as $val){
	$valid_category[$val['category_data']['name_e']]++;
}
arsort($valid_category);

foreach($contents_data as $key=>$val){
	if($val['category_group_data']['name_e'] == $the_category_group_name){
		$category_menu[] = $val;
	}
}

//cidをキーにしたメニューデータ
foreach($category_menu as $val){
	$category_menu_2[$val['contents_id']] = $val;
}
if($_GET['order']=='popular'){
	//PV順
	$category_menu = popular_data($category_menu_2);
}elseif($_GET['order']=='comment'){
	//コメント数順
	$category_menu =many_comment_menu($category_menu_2);
}else{
	//新着順
	array_multisort( array_map( "strtotime", array_column( $category_menu, 'start_date' ) ), SORT_DESC, $category_menu ) ;
}


//小カテゴリごとのメニュー数
foreach($contents_data as $val){
	$category_count[$val['category_data']['name_e']]++;
}


$tpl->contents_data = contents_data();
$tpl->comment_data = comment_data();
$tpl->category_group_data = $category_group_data;
$tpl->category_data = $category_data;
$tpl->category_count = $category_count;
$tpl->valid_category = $valid_category;
$tpl->nayami = nayami();
$tpl->keyword_data = keyword_data();
$tpl->now_url = now_url_ex_arg().'?';
$tpl->recommend_data = recommend_data();
$tpl->popular_data = popular_data();
$tpl->category_menu = $category_menu;
$tpl->the_category_group_data = $category_group_data[$the_category_group_name];
$tpl->meta_info = meta_info()['category_group'][$the_category_group_name];
$tpl->show(SERVICE_PATH.'template/category_group.php');