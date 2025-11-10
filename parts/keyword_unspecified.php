<?php
//キーワードページでキーワードが指定されていない場合

$contents_data = contents_data();

//新着メニュー
// $contents_data_new = $contents_data;
// array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;

//大カテゴリ別ピックアップメニュー
foreach($contents_data as $key=>$val){
	$category_menu[$val['category_group_data']['name_e']][]=$val;
}
//シャッフル
foreach($category_menu as $key=>$val){
	shuffle($category_menu[$key]);
}




$tpl->keyword_data = keyword_data();
$tpl->recommend_data = recommend_data();
$tpl->popular_data = popular_data();
$tpl->category_menu = $category_menu;
$tpl->category_menu = $category_menu;
$tpl->category_data = category_data();
$tpl->category_group_data = category_group_data();
$tpl->keyword_count = -1;
$tpl->nayami = nayami();
$tpl->show(SERVICE_PATH.'template/all_keyword.php');