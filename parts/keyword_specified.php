<?php
//指定キーワード
$keyword = $_GET['keyword'];

// prevパラメータがある場合は公開日が未来のメニューも含める
$include_future = isset($_GET['prev']);
$contents_data = contents_data($include_future);

// prevパラメータがあってキーワードが空の場合は全メニューを表示
if ($include_future && !$keyword) {
	$category_menu = $contents_data;
} else {
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

	// ページネーション処理
	$per_page = 50;
	$total_count = count($category_menu);
	$total_pages = ceil($total_count / $per_page);
	$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
	$current_page = min($current_page, $total_pages);
	$offset = ($current_page - 1) * $per_page;

	// 表示用メニューを50件に制限
	$category_menu_all = $category_menu;
	$category_menu = array_slice($category_menu, $offset, $per_page);
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

// ページネーション用変数
$tpl->current_page = isset($current_page) ? $current_page : 1;
$tpl->total_pages = isset($total_pages) ? $total_pages : 1;
$tpl->total_count = isset($total_count) ? $total_count : 0;

$tpl->show(SERVICE_PATH.'template/all_keyword.php');