<?php 
session_start();
$_SESSION['seed'] = intval(time());//結果ページリロード時はカード変えないため

$contents_id = $_GET['menu'];
// prevパラメータがある場合は公開日が未来のメニューも含める
$include_future = isset($_GET['prev']);
$contents_data = contents_data($include_future);

foreach($contents_data as $val){
	if($val['contents_id']==$contents_id){
		$the_contents_data = $val;
	}
}



//カテゴリーデータ
$the_category_group_name = explode('/',$_SERVER['REQUEST_URI'])[2];
$the_category_name = explode('/',$_SERVER['REQUEST_URI'])[3];
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

//項目データ
$the_menu_data = menu_data($contents_id);
foreach($the_menu_data as $the_menu_data);

$tmp = [];
$sql = "SELECT contents_id,menu_id,result_id,body FROM mana_result where contents_id = $contents_id";
// $tmp = my_db_connect($sql);
$pdo = db_connect();
$tmp = db_select($pdo,$sql);


$result_pattern_count = 0;
foreach($tmp as $val){
	//結果パターン数を項目2から取得
	if($val['menu_id']==$contents_id.'02'){
		$result_pattern_count++;
	}

	//結果IDをキーにした配列に変換
	$result_data_tmp[$val['result_id']] = $val;
}

//結果データ
$result_pattern_id = 1;
if(!empty($result_pattern_count)){
	$result_pattern_id = mt_rand(1,$result_pattern_count);
}
foreach($the_menu_data as $key=>$val){
	//最初と最後は常に結果パターンIDが1
	if($key==0 || $key==array_key_last($the_menu_data)){
		$result_pattern_id_now = 1;
	}else{
		$result_pattern_id_now = $result_pattern_id;
	}
	$result_data[$contents_id][$val['menu_id']] = $result_data_tmp[$val['menu_id'].sprintf('%02d',$result_pattern_id_now)]['body'];
}


//カードデータ
$tmp = [];
$sql = "SELECT contents_id,menu_id,result_id,body FROM mana_card where contents_id = $contents_id";
// $tmp = my_db_connect($sql);
$pdo = db_connect();
$tmp = db_select($pdo,$sql);

foreach($tmp as $key=>$val){
	$result_key = $val['menu_id'].sprintf('%02d',$result_pattern_id);
	if($val['result_id']==$result_key){
		$card_data[$contents_id][$val['menu_id']] = $val['body'];
	}
}


//タグをmetaキーワードにする
$tags = [];
for ($i = 1; $i <= 5; $i++) {
    $tag = $the_contents_data["tag_$i"];
    if ($tag !== null) {
        $tags[] = $tag;
    }
}
$concatenated_tags = implode(',', $tags);


$tpl->the_contents_data = $the_contents_data;
$tpl->category_data = $category_data;
$tpl->the_category_data = $the_category_data;
$tpl->the_category_group_data = $the_category_group_data;
$tpl->the_comment_data = comment_data($contents_id);
$tpl->card_count = count($card_data[$contents_id])-1;//最後の項目にはカードがないが、データ上、0が入っているため-1
$tpl->canonical=SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'].'/?menu='.$contents_id.'&mode=entry';
$tpl->the_menu_data = $the_menu_data;
$tpl->meta_info['description'] = $the_contents_data['caption'];
$tpl->meta_info['keyword'] = 'タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット,'.$the_category_group_data['name'].','.$the_category_data['name'].','.$concatenated_tags;
$tpl->category_caption = category_caption();

$tpl->show(SERVICE_PATH.'template/entry.php');