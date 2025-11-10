<?php
session_start();

if ($_GET['menu']) {
	$cid = $_GET['menu'];
} else {
	echo 'メニューが指定されていません。';
	exit;
}

$category_data = category_data();
$contents_data = contents_data();
$menu_data_tmp = menu_data($cid);

foreach ($menu_data_tmp[$cid] as $val) {
	$menu_data[$cid][$val['menu_id']] = $val['name'];
}

//カテゴリーデータ
$the_category_group_name = explode('/', $_SERVER['REQUEST_URI'])[2];
$the_category_name = explode('/', $_SERVER['REQUEST_URI'])[3];
$category_data = category_data();
foreach ($category_data as $key => $val) {
	if ($val['name_e'] == $the_category_name) {
		$the_category_data = $val;
	}
}
$category_group_data = category_group_data();
foreach ($category_group_data as $val) {
	if ($val['category_group_id'] == $the_category_data['category_group_id']) {
		$the_category_group_data = $val;
	}
}


//結果データ
$tmp = [];
$sql = "SELECT contents_id,menu_id,result_id,body FROM mana_result where contents_id = $cid";
// $tmp = my_db_connect($sql);
$pdo = db_connect();
$tmp = db_select($pdo, $sql);
$result_pattern_count = 0;
foreach ($tmp as $val) {
	//結果パターン数を項目2から取得
	if ($val['menu_id'] == $cid . '02') {
		$result_pattern_count++;
	}

	//結果IDをキーにした配列に変換
	$result_data_tmp[$val['result_id']] = $val;
}

//項目2がない場合は項目1から結果パターン数を取得（id300以降の1項目しかないメニューを想定）
if (!$result_pattern_count) {
	foreach ($tmp as $val) {
		if ($val['menu_id'] == $cid . '01') {
			$result_pattern_count++;
		}
	}
}


// ユーザー識別子
if (!isset($_COOKIE['user_id'])) {
	$user_id = intval(uniqid(), 16);
	setcookie('user_id', $user_id, strtotime('today 23:59'));//当日の23:59まで有効
} else {
	$user_id = $_COOKIE['user_id'];
}


// $seed = intval(str_replace('.', '', $_SERVER["REMOTE_ADDR"])) + intval(date('Ymd')) + intval($cid);
// $seed = $user_id;
$seed = $_SESSION['seed'];//入力ページで取得
mt_srand($seed);
$result_pattern_id = mt_rand(1, $result_pattern_count);

$hauoli_id = mt_rand(1, 60);

foreach ($menu_data[$cid] as $key => $val) {
	//cid300未満は最初と最後は常に結果パターンIDが1
	if ($cid < 300 && ($key == array_key_first($menu_data[$cid]) || $key == array_key_last($menu_data[$cid]))) {
		$result_pattern_id_now = 1;
	} else {
		$result_pattern_id_now = $result_pattern_id;
	}

	$a = $result_data_tmp[$key . sprintf('%02d', $result_pattern_id_now)]['body']; //改行なしの本文

	//自動改行
	if (strpos($a, '<br>') !== false) {
		// $a に <br> が含まれる場合
		$result_data[$cid][$key] = $a;
	} else {
		// $a に <br> が含まれない場合
		$result_data[$cid][$key] = str_replace('。', '。<br>', $a);
	}
}



//結果カードデータ
$tmp = [];
$sql = "SELECT contents_id,menu_id,result_id,body FROM mana_card where contents_id = $cid";
// $tmp = my_db_connect($sql);
$pdo = db_connect();
$tmp = db_select($pdo, $sql);
foreach ($tmp as $key => $val) {
	$result_key = $val['menu_id'] . sprintf('%02d', $result_pattern_id);
	if ($val['result_id'] == $result_key) {
		$card_data[$cid][$val['menu_id']] = $val['body'];
	}
}





//関連メニュー
$category_menu = category_menu($contents_data[$cid]['category_data']['name_e']);
shuffle($category_menu);

//新着メニュー
// $contents_data_new = $contents_data;
// array_multisort( array_map( "strtotime", array_column( $contents_data_new, 'start_date' ) ), SORT_DESC, $contents_data_new ) ;

//カード名
$card_info = card_data();

//コメント
$comment_send = $_SESSION['comment_send'];
unset($_SESSION['comment_send']);


//タグをmetaキーワードにする
$tags = [];
for ($i = 1; $i <= 5; $i++) {
	$tag = $contents_data[$cid]["tag_$i"];
	if ($tag !== null) {
		$tags[] = $tag;
	}
}
$concatenated_tags = implode(',', $tags);




$card_count = count($card_data[$cid]) - 1;
$spread_id = getSpreadId($card_count);
//スプレッド用カードデータ（結果カードにスプレッド必要枚数を追加）
foreach ($card_data[$cid] as $val) {
	$result_card_ids[] = $val;
}
$spread_card_id = card_add($result_card_ids, $spread_id - count($result_card_ids));

//ハウオリ
$hauoli = hauoli()[$hauoli_id];

//コメント
$comment_data = comment_data($cid);
foreach ($comment_data as $val) {
	$sum += $val['score'];
}
$comment_average = 0;
if(!empty($sum)){
	$comment_average = number_format($sum / count($comment_data), 1);
}
//結果関連コンテンツ
$recommend_contents = recommend_contents()[$cid];


$tpl->category_data = $category_data;
$tpl->contents_data = $contents_data;
$tpl->category_menu = $category_menu;
$tpl->recommend_data = recommend_data();
$tpl->keyword_data = keyword_data();
$tpl->contents_data_new = new_contents_data();
$tpl->the_contents_data = $contents_data[$cid];
$tpl->the_category_data = $the_category_data;
$tpl->the_category_group_data = $the_category_group_data;
$tpl->menu_data = $menu_data;
$tpl->result_data = $result_data;
$tpl->card_data = $card_data;
$tpl->card_info = $card_info;
$tpl->card_count = count($card_data[$cid]);
$tpl->spread_id = $spread_id;
$tpl->spread_card_id = $spread_card_id;
$tpl->cid = $cid;
$tpl->comment_send = $comment_send;
$tpl->now_url = now_url();
$tpl->comment_data = $comment_data;
$tpl->comment_data_all = comment_data();
$tpl->comment_average = $comment_average;
$tpl->recommend_contents = $recommend_contents;
$tpl->popular_data = popular_data();
$tpl->hauoli = $hauoli;
$tpl->meta_info['description'] = strip_tags(mb_substr($result_data[$cid][$cid . '01'], 0, 100)) . '…';
$tpl->meta_info['keyword'] = 'タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット,' . $the_category_group_data['name'] . ',' . $the_category_data['name'] . ',' . $concatenated_tags;
$tpl->show(SERVICE_PATH . 'template/result.php');
