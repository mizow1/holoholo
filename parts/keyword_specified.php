<?php
//指定キーワード
$keyword = $_GET['keyword'];

$contents_data = contents_data();
foreach ($contents_data as $val) {
	$filter_keyword = [$val['tag_1'],$val['tag_2'],$val['tag_3'],$val['tag_4'],$val['tag_5'],$val['category_data']['name'],$val['category_group_data']['name']];
	if (in_array($keyword,$filter_keyword)) {
		$category_menu[] = $val;
	}

	//指定キーワードが無料占い、タロットの場合は全メニューを表示
	$all_menu_keyword = ['無料占い','タロット占い'];
	if(in_array($keyword,$all_menu_keyword)){
		$category_menu = $contents_data;
	}
}

if($category_menu){
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
}


//canonical
$canonical = $keyword ? now_url_ex_arg().'?keyword='.$keyword :now_url_ex_arg();


$tpl->category_menu = $category_menu;
$tpl->contents_data = $contents_data;
$tpl->keyword_data = keyword_data();
$tpl->keyword = $keyword;
$tpl->recommend_data = recommend_data();
$tpl->popular_data = popular_data();
$tpl->keyword_count = -1;
// $tpl->keyword_specified = $keyword?1:0;
$tpl->now_url = now_url_ex_arg().'?keyword='.$keyword.'&';
$tpl->canonical = $canonical;
$tpl->show(SERVICE_PATH.'template/all_keyword.php');