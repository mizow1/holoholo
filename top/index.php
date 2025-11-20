<?php
session_start();
session_unset();//結果ページのseedを削除

require_once('../lib/template.php');
require_once('../lib/functions.php');
require_once('../parts/log.php');
$tpl = new MyTemplate();
$contents_data = contents_data();

//新着メニュー
// $contents_data_new = $contents_data;
// array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;
// $today = date("Y-m-d H:i:s");
// foreach ($contents_data_new as $content) {
//     // start_dateが今日より未来であればスキップ
//     if ($content['start_date'] > $today) {
//         continue;
//     }

//     // それ以外の場合、新しい配列に追加
//     $contents_data_new_2[] = $content;
// }



//大カテゴリ別ピックアップメニュー
foreach($contents_data as $key=>$val){
	$category_menu[$val['category_group_data']['name_e']][]=$val;
}
//シャッフル
foreach($category_menu as $key=>$val){
	shuffle($category_menu[$key]);
}

//タグリスト
$keyword_data = keyword_data($contents_data);

//おすすめメニュー
$tpl->category_data = category_data();
$tpl->category_group_data = category_group_data();
$tpl->contents_data = $contents_data;
$tpl->category_menu = $category_menu;
$tpl->comment_data = comment_data();
$tpl->contents_data_new = new_contents_data($contents_data);
$tpl->recommend_data = recommend_data($contents_data);
$tpl->popular_data = popular_data($contents_data);
$tpl->nayami = nayami();
$tpl->keyword_data = $keyword_data;
$tpl->canonical=SERVICE_URL;
$tpl->meta_info = meta_info()['top'];
$tpl->show(SERVICE_PATH.'template/top.php');