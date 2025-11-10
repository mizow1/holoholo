<?php 
//当該カテゴリIDを取得
$the_category_group_name = explode('/',$_SERVER['REQUEST_URI'])[2];
$the_category_name = explode('/',$_SERVER['REQUEST_URI'])[3];
$category_menu = category_menu($the_category_name);
$category_data = category_data();
foreach($category_data as $key=>$val){
	if($val['name_e']==$the_category_name){
		$the_category_data = $val;
	}
}
$category_group_data = category_group_data();
foreach($category_group_data as $val){
	if($val['category_group_id']==$the_category_data['category_group_id']){
		$the_category_group_data = $val;
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



$tpl->category_data = $category_data;
$tpl->category_group_data = $category_group_data;
$tpl->contents_data = contents_data();
$tpl->category_menu = $category_menu;
$tpl->now_url = now_url_ex_arg().'?';
$tpl->the_category_group_data = $the_category_group_data;
$tpl->the_category_data = $the_category_data;
$tpl->canonical=SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'].'/';
$tpl->meta_info = meta_info()['category'][$the_category_name];
$tpl->category_caption = category_caption();
$tpl->show(SERVICE_PATH.'template/category.php');