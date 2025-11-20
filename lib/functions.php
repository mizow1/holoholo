<?php
require_once(__DIR__ . '/config.php');

const SERVICE_NAME = '【完全無料】ホロホロタロット占い 愛と癒しのハワイアン・タロット';
// const SERVICE_NAME_LOWER = '当たる!!無料のホロホロタロット占い';
const SERVICE_NAME_LOWER = 'よく当たる完全無料占い-ホロホロタロット';
const SERVICE_URL = 'https://www.goodfortune.jp/tarot/';
const SERVICE_PATH = '/var/www/html/dev/public_html/tarot/';
function db_connect()
{
	$pdo = new PDO("mysql:charset=utf8;dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASSWORD);
	// $stmt = $pdo->prepare($sql);
	// $stmt->bindParam( ':id', $id, PDO::PARAM_STR);
	// $res = $stmt->execute();
	// $data = $stmt->fetchAll();
	// $pdo = null;
	// return $data;
	return $pdo;
}

function db_select($pdo, $sql)
{
	$stmt = $pdo->prepare($sql);
	$res = $stmt->execute();
	$data = $stmt->fetchAll();
	$pdo = null;
	return $data;
}


function contents_data()
{
	$sql = "SELECT * FROM mana_contents";
	// $tmp = my_db_connect($sql);
	$pdo = db_connect();
	$tmp = db_select($pdo, $sql);

	foreach ($tmp as $val) {
		$contents_data[$val['contents_id']]['contents_id'] = $val['contents_id'];
		$contents_data[$val['contents_id']]['name'] = $val['name'];
		$contents_data[$val['contents_id']]['catch'] = $val['catch'];
		$contents_data[$val['contents_id']]['caption'] = $val['caption'];
		$contents_data[$val['contents_id']]['category_id'] = $val['category'];
		$contents_data[$val['contents_id']]['tag_1'] = $val['tag_1'];
		$contents_data[$val['contents_id']]['tag_2'] = $val['tag_2'];
		$contents_data[$val['contents_id']]['tag_3'] = $val['tag_3'];
		$contents_data[$val['contents_id']]['tag_4'] = $val['tag_4'];
		$contents_data[$val['contents_id']]['tag_5'] = $val['tag_5'];
		$contents_data[$val['contents_id']]['start_date'] = $val['start_date'];
	}
	$category_data = category_data();
	$category_group_data = category_group_data();

	foreach ($contents_data as $key => $val) {
		//公開前メニューは除外
		if (strtotime($val['start_date']) < time()) {
			$contents_data2[$key] = $val;
			$contents_data2[$key]['category_data'] = $category_data[$val['category_id']];
			$contents_data2[$key]['category_group_data'] = $category_group_data[$contents_data2[$key]['category_data']['category_group_id']];
			$contents_data2[$key]['url'] = SERVICE_URL . $contents_data2[$key]['category_group_data']['name_e'] . '/' . $contents_data2[$key]['category_data']['name_e'] . '/?menu=' . $val['contents_id'] . '&mode=entry';
		}
	}


	//リリース日順（にするとキーが振り直される問題）
	// array_multisort( array_map( "strtotime", array_column( $contents_data, 'start_date' ) ), SORT_DESC, $contents_data ) ;

	return $contents_data2;
}

function menu_data($cid)
{
	$sql = "SELECT contents_id,menu_id,name FROM mana_menu where contents_id = $cid";
	$pdo = db_connect();
	$tmp = db_select($pdo, $sql);
	$menu_count = count($tmp);
	foreach ($tmp as $key => $val) {
		$menu_data[$cid][$key]['name'] = $val['name'];
		$menu_data[$cid][$key]['menu_id'] = $val['menu_id'];
	}
	return $menu_data;
}

function category_data()
{
	$sql = "SELECT category_id,category_group_id,name,name_e FROM mana_category";
	$pdo = db_connect();
	$a = db_select($pdo, $sql);

	foreach ($a as $val) {
		$b[$val['category_id']] = $val;
	}


	return $b;
}

function category_group_data()
{
	$sql = "SELECT * FROM mana_category_group";
	$pdo = db_connect();
	$a = db_select($pdo, $sql);

	foreach ($a as $val) {
		$b[$val['category_group_id']] = $val;
		$b[$val['category_group_id']]['url'] = SERVICE_URL . $val['name_e'] . '/';
	}

	return $b;
}

function category_menu($category_name)
{
	$category_data = category_data();

	foreach ($category_data as $key => $val) {
		if ($val['name_e'] == $category_name) {
			$category_id = $val['category_id'];
			break;
		}
	}

	$contents_data = contents_data('');

	foreach ($contents_data as $key => $val) {
		//当該カテゴリーメニュー
		if ($val['category_data']['category_id'] == $category_id) {
			$category_menu[$key] = $val;
		}
	}
	return $category_menu;
}


function comment_data($contents_id = '')
{
	$where = $contents_id ? ' and contents_id = ' . $contents_id : '';
	$sql = "SELECT * FROM mana_comment where approval=1" . $where;

	$pdo = db_connect();
	$a = db_select($pdo, $sql);

	//新着順
	array_multisort(array_map("strtotime", array_column($a, 'date')), SORT_DESC, $a);
	return $a;
}

//引数を含めた現在のURL
function now_url()
{
	$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return $now_url;
}

//引数を除外した現在のURL
function now_url_ex_arg()
{
	$now_url = explode('?', now_url())[0];
	return $now_url;
}

function card_data()
{
	$file = fopen(__DIR__ . '/card_name.csv', 'r');
	while ($data = fgetcsv($file)) {
		mb_convert_variables('UTF-8', 'SJIS', $data);
		$a[] = $data;
	}
	fclose($file);

	//カードIDをキーにした配列にする
	foreach ($a as $val) {
		$b[$val[0]]['id'] = $val[0];
		$b[$val[0]]['kaki'] = $val[1];
		$b[$val[0]]['yomi'] = $val[2];
		$b[$val[0]]['keyword'] = $val[3];
		$b[$val[0]]['summary'] = $val[4];
		$b[$val[0]]['detail'] = $val[5];
	}

	return $b;
}

//おすすめメニュー
function recommend_data($contents_data = null)
{
	if (!$contents_data) {
		$contents_data = contents_data();
	}
	$ids = [274, 273, 272];
	foreach ($ids as $id) {
		$a[] = $contents_data[$id];
	}
	return $a;
}

//テーマおすすめメニュー
function theme_recommend_data($category_group = '', $category = '')
{
	$a = contents_data();

	//小カテゴリー指定時
	if ($category) {
		foreach ($a as $val) {
			if ($val['category_data']['name_e'] == $category) {
				$b[] = $val;
			}
		}
		//小カテゴリー指定なしのときは大カテゴリーに一致するメニューを抽出
	} else {
		foreach ($a as $val) {
			if ($val['category_group_data']['name_e'] == $category_group) {
				$b[] = $val;
			}
		}
	}
	return $b;
}

//新着メニューデータ
function new_contents_data($contents_data = null)
{
	if (!$contents_data) {
		$contents_data = contents_data();
	}
	$contents_data_new = $contents_data;
	array_multisort(array_map("strtotime", array_column($contents_data_new, 'start_date')), SORT_DESC, $contents_data_new);
	$today = date("Y-m-d H:i:s");
	foreach ($contents_data_new as $content) {
		// start_dateが今日より未来であればスキップ
		if ($content['start_date'] > $today) {
			continue;
		}

		// それ以外の場合、新しい配列に追加
		$contents_data_new_2[] = $content;
	}
	return $contents_data_new_2;
}

//人気ランキング
function popular_data($menu_data = '')
{
	$menu_data = $menu_data ? $menu_data : contents_data();

	// キャッシュファイルのパスと有効期限（1時間）
	$cache_file = SERVICE_PATH . 'cache/popular_counts.json';
	$cache_duration = 3600;

	// キャッシュディレクトリが存在しない場合は作成
	$cache_dir = SERVICE_PATH . 'cache';
	if (!file_exists($cache_dir)) {
		mkdir($cache_dir, 0755, true);
	}

	// キャッシュが有効かチェック
	$use_cache = false;
	if (file_exists($cache_file)) {
		$cache_time = filemtime($cache_file);
		if ((time() - $cache_time) < $cache_duration) {
			$use_cache = true;
		}
	}

	if ($use_cache) {
		// キャッシュから読み込み
		$menuCounts = json_decode(file_get_contents($cache_file), true);
	} else {
		// CSVから集計
		$menuCounts = [];
		$file = fopen(SERVICE_PATH . 'holoholo_access_log.csv', 'r');
		while ($data = fgetcsv($file)) {
			mb_convert_variables('UTF-8', 'SJIS', $data);
			$url = $data[2];
			if (preg_match('/\?menu=(\d+)/', $url, $matches)) {
				$menuNumber = intval($matches[1]);
				if (isset($menuCounts[$menuNumber])) {
					$menuCounts[$menuNumber]++;
				} else {
					$menuCounts[$menuNumber] = 1;
				}
			}
		}
		fclose($file);
		arsort($menuCounts);

		// キャッシュに保存
		file_put_contents($cache_file, json_encode($menuCounts));
	}

	foreach ($menu_data as $key => $val) {
		$menu_data[$key]['pv'] = $menuCounts[$val['contents_id']];
	}

	//pv順でソート
	foreach ($menu_data as $key => $val) {
		$sort[$key] = $val['pv'];
	}
	array_multisort($sort, SORT_DESC, $menu_data);

	return $menu_data;
}

//鑑定結果関連外部リンク
function recommend_contents()
{
	$file = fopen(SERVICE_PATH . 'lib/recommend_contents.csv', 'r');
	while ($data = fgetcsv($file)) {
		mb_convert_variables('UTF-8', 'SJIS', $data); //ファイルがSJISなら
		$tmp[] = $data;
	}
	fclose($file);
	foreach ($tmp as $val) {
		$a = [];
		if ($val[4] || $val[5] || $val[6]) {

			//ホロホロリンク
			if ($val[3] && $val[7]) {
				$a['holoholo']['text'] = $val[2];
				$a['holoholo']['contents_id'] = $val[3];
				$a['holoholo']['template'] = $val[7];
			}

			//テキストリンク
			if ($val[2] && ($val[4] || $val[5] || $val[6])) {
				$a['text']['text'] = $val[2];
				$a['text']['url'] = $val[4] ? $val[4] : '';
				$a['text']['url'] = $val[5] ? $val[5] : $a['text']['url'];
				$a['text']['url'] = $val[6] ? $val[6] : $a['text']['url'];
				$a['text']['template'] = 'text';
			}

			//さちこいリンク
			if ($val[4] && $val[8]) {
				$a['sachikoi']['text'] = $val[2];
				$a['sachikoi']['url'] = $val[4];
				$a['sachikoi']['template'] = $val[8];
			}

			//姓名判断リンク
			if ($val[6] && $val[9]) {
				$a['seimei']['text'] = $val[2];
				$a['seimei']['url'] = $val[6];
				$a['seimei']['template'] = $val[9];
			}

			$b[$val[0]][$val[1]] = $a;
		}
	}
	return $b;
}

//レビュー数順メニューリスト
function many_comment_menu($menu_data)
{
	$a = $menu_data;
	$b = comment_data();

	//コメント配列のキーをcontent id にする
	foreach ($b as $val) {
		$c[$val['contents_id']]++;
		$d[$val['contents_id']][] = $val;
	}
	//コメントされたcontents_idがメニューリストにあれば、そのメニューデータにコメント数を加える
	foreach ($a as $key => $val) {
		$a[$key]['comment_count'] = $c[$val['contents_id']];
		$a[$key]['comment_data'] = $d[$val['contents_id']];
	}

	//コメント多い順にならびかえ
	foreach ($a as $key => $val) {
		$sort[$key] = $val['comment_count'];

		//コメント平均点
		if ($val['comment_data']) {
			foreach ($val['comment_data'] as $val2) {
				$e[$val2['contents_id']]['sum'] += $val2['score'];
				$e[$val2['contents_id']]['count']++;
			}
		}
	}
	array_multisort($sort, SORT_DESC, $a);

	foreach ($e as $contents_id => $val) {
		$comment_average_score[$contents_id] = number_format($val['sum'] / $val['count'], 1); //コメント平均点小数点第一位まで
	}

	//コメント平均点を統合
	foreach ($a as $key => $val) {
		if ($comment_average_score[$val['contents_id']]) {
			$a[$key]['average'] = $comment_average_score[$val['contents_id']];
		}
	}


	return $a;
}

//こんな悩みの人が占っています
function nayami()
{
	$nayami['renai'] = '両思いなのになんか不安…あの人は本気で私に惚れてるの？もしかして冷められた⁉<br>片思い中だけど苦しい…もうあきらめた方がいいの？でも本音は成就させたい！<br>そんな恋の悩みを抱えるあなたをHoloHoloタロット占いで幸せな恋愛に導きます！';
	$nayami['kekkon'] = '出会いがな～い！そもそも出会う場所にも行ってな～い！<br>一生独身⁉…それは嫌‼<br>そんな諦めモードのあなたに朗報です‼恋の出会いから将来のパートナーまでハワイの神様から素敵な御告げが…!?<br>';
	$nayami['jinsei'] = '毎日がつまらない、最近嫌なことばかり続いている…あの時ああしていれば…なんて後悔している人や、ちょっと運試ししてみたい！気楽に未来を覗いてみたい！という方までHoloHoloタロットはまるっとハッピーにします♪<br>';
	return $nayami;
}

//入力ページのカテゴリーの上の文言
function category_caption()
{
	$a['ryouomoi'] = '相手の気持ちや結婚願望が知りたいあなたへ';
	$a['kataomoi'] = '2人の現状から恋の結末まで';
	$a['aitenokimochi'] = 'あの人の本心や願望、心の距離などが丸見え‼';
	$a['furin'] = '禁断の恋の行方は？あの人の本音や2人の運命';
	$a['yorunoaishou'] = '2人の心と体の相性は？禁断の相性占い';
	$a['kekkon'] = 'あなたが出会う運命の相手は？';
	$a['jinsei'] = 'あなたの人生に起こる出来事や、幸せの分岐点';
	$a['sigoto'] = '仕事に悩みがある人必見!!成功の秘訣は？';
	$a['fukuen'] = 'もう無理？それともヨリを戻せる？';
	$a['deai'] = '次に出会う人はどんな人？いつ出会う？';
	return $a;
}

//365日占い
function birthday_data()
{
	$file = fopen(SERVICE_PATH . 'lib/birthday.csv', 'r');
	while ($data = fgetcsv($file)) {
		mb_convert_variables('UTF-8', 'SJIS', $data); //ファイルがSJISなら
		$a[] = $data;
	}
	fclose($file);
	foreach ($a as $key => $val) {
		$b[$key]['month'] = $val[0];
		$b[$key]['day'] = $val[1];
		$b[$key]['card_id'] = $val[2];
		$b[$key]['summary'] = $val[3];
		$b[$key]['destiny'] = $val[4];
		$b[$key]['item_name'] = $val[5];
		$b[$key]['item_info'] = $val[6];
		$b[$key]['no'] = $val[7];
		$b[$key]['no_name'] = $val[8];
		$b[$key]['strong'] = $val[9];
		$b[$key]['match'][1] = $val[10];
		$b[$key]['match'][2] = $val[11];
		$b[$key]['celebrity'] = $val[12];
		$b[$key]['pickup_celebrity'] = $val[13];
		$b[$key]['pickup_celebrity_job'] = $val[14];
		$b[$key]['keyword'] = $val[15];
	}
	return $b;
}

//タグ
function keyword_data($contents_data = null)
{
	$a = $contents_data ? $contents_data : contents_data();
	//各タグの個数集計
	foreach ($a as $item) {
		for ($i = 1; $i <= 5; $i++) {
			$tagKey = 'tag_' . $i;
			if ($item[$tagKey]) {
				$tag = $item[$tagKey];
				if (isset($tagCounts[$tag])) {
					$tagCounts[$tag]++;
				} else {
					$tagCounts[$tag] = 1;
				}
			}
		}
	}

	//多い順ソート
	arsort($tagCounts);

	//キーが値だと使いにくいので
	foreach ($tagCounts as $key => $val) {
		$b[] = ['count' => $val, 'name' => $key];
	}

	return $b;
}

//誕生日占いアイテムID
function birthday_item_id()
{
	$a = [
		'イルカ' => 1,
		'ハイビスカス' => 2,
		'釣り針' => 3,
		'ウミガメ' => 4,
		'プルメリア' => 5,
		'ティーリーフ' => 6,
		'クジラの尾' => 7,
		'モンステラ' => 8,
		'波' => 9,
		'パイナップル' => 10,
		'ヤシの木' => 11,
		'ヒトデ' => 12,
		'フェザー' => 13,
		'ヤモリ' => 14,
		'馬蹄' => 15,
		'アンカー' => 16,
		'樽' => 17,
	];
	return $a;
}

//ハウオリ
function hauoli()
{
	$file = fopen(__DIR__ . '/hauoli.csv', 'r');
	while ($data = fgetcsv($file)) {
		// mb_convert_variables('UTF-8', 'SJIS', $data);
		$a[] = $data;
	}
	fclose($file);
	foreach ($a as $key => $val) {
		$b[$val[0]]['id'] = $val[0];
		$b[$val[0]]['name_e'] = $val[1];
		$b[$val[0]]['name'] = $val[2];
		$b[$val[0]]['short'] = $val[3];
		$b[$val[0]]['long'] = $val[4];
	}
	return $b;
}


//作成用サイト内ディレクトリ名取得（サイトマップ）
function get_dir($dir)
{
	$dirs = [];
	$entries = scandir($dir);

	foreach ($entries as $entry) {
		if ($entry != "." && $entry != "..") {
			$path = $dir . '/' . $entry;
			if (is_dir($path)) {
				$dirs[$entry] = get_dir($path);
			}
		}
	}

	//除外
	$ex = ['img', 'css', 'template', 'js', 'lib', 'parts', 'result', 'webfonts', 'entry', 'graph'];

	$a = filterArray($dirs, $ex);


	return $a;
}

function filterArray($array, $excludedKeys)
{
	$filteredArray = [];
	foreach ($array as $key => $value) {
		if (!in_array($key, $excludedKeys)) {
			if (is_array($value)) {
				// もし値が配列なら再帰的にフィルタリング
				$filteredArray[$key] = filterArray($value, $excludedKeys);
			} else {
				$filteredArray[$key] = $value;
			}
		}
	}
	return $filteredArray;
}

function dir_info($dir)
{
	//ページ情報
	$info['about'] = ['order' => 10, 'name' => 'HoloHoloタロット占いについて'];
	$info['birthday'] = ['order' => 7, 'name' => '365日タロット占い'];
	$info['card'] = ['order' => 8, 'name' => '365日タロット占いカード選択'];
	$info['jinsei'] = ['order' => 4, 'name' => '人生タロット占い'];
	$info['kekkon'] = ['order' => 3, 'name' => '結婚タロット占い'];
	$info['renai'] = ['order' => 2, 'name' => '恋愛タロット占い'];
	$info['keyword'] = ['order' => 9, 'name' => 'キーワード検索'];
	$info['aitenokimochi'] = ['order' => 1, 'name' => '相手の気持ちタロット占い'];
	$info['furin'] = ['order' => 1, 'name' => '不倫タロット占い'];
	$info['kataomoi'] = ['order' => 1, 'name' => '片思いタロット占い'];
	$info['ryouomoi'] = ['order' => 1, 'name' => '両思いタロット占い'];
	$info['yorunoaishou'] = ['order' => 1, 'name' => '夜の相性タロット占い'];
	$info['sitemap'] = ['order' => 999, 'name' => 'サイトマップ'];
	$info['terms'] = ['order' => 999, 'name' => '利用規約'];
	$info['today'] = ['order' => 5, 'name' => '今日の運勢“ラキ・タロット”'];
	$info['top'] = ['order' => 1, 'name' => 'トップページ”'];
	$info['yesno'] = ['order' => 6, 'name' => 'YES・NOタロット占い'];
	foreach ($dir as $key => $val) {
		$dir[$key] = $info[$key];
	}
	return $dir;
}


//存在する月日かどうか
function exist_day($month, $day)
{
	if (
		$month !== null && $day !== null &&
		is_numeric($month) && is_numeric($day) &&
		$month >= 1 && $month <= 12 &&
		$day >= 1 && $day <= cal_days_in_month(CAL_GREGORIAN, $month, date('Y'))
	) {
		return 1;
	} else {
		return 2;
	}
}

//カード枚数に応じてスプレッド決定
function getSpreadId($card_count)
{
	// if ($card_count == 1) {
	//   return 1;
	// } else if ($card_count <= 3) {
	//   return 3;
	// } else if ($card_count <= 7) {
	//   return 10;
	// } else {
	//   return 10;
	// }
	return 10;
}

//スプレッド構成に足りないカードを補完
function card_add($exclude_values, $lack_count)
{
	$all_card_id = range(1, 44); // 1から44までの数値の配列を作成


	// 除外する数値を削除
	$rest_card_id = array_diff($all_card_id, $exclude_values);

	// ランダムな数値を選ぶ
	$random_id = [];
	for ($i = 0; $i < $lack_count; $i++) {
		
		// ユーザー識別子
		// $seed = intval($_SERVER["REMOTE_ADDR"]) + intval(date('Ymd'));
		if (!isset($_COOKIE['user_id'])) {
			$seed = intval(uniqid(), 16);
			setcookie('user_id', $seed, strtotime('today 23:59')); //当日の23:59まで有効
		} else {
			$seed = $_COOKIE['user_id'];
		}

		srand($seed);
		$randomIndex = array_rand($rest_card_id);
		$random_id[] = $rest_card_id[$randomIndex];
		unset($rest_card_id[$randomIndex]); // 重複選択を防ぐために選んだ要素を削除
	}

	return	array_merge($exclude_values, $random_id);
}

//アクセス解析csvデータ絞り込み
function filterData($data, $start_date, $end_date, $include, $exclude)
{
	return array_filter($data, function ($record) use ($start_date, $end_date, $include, $exclude) {
		// 日付チェック (空欄の場合は無制限)
		if (!empty($start_date) && strtotime($record['date']) < strtotime($start_date)) {
			return false;
		}
		if (!empty($end_date) && strtotime($record['date']) > strtotime($end_date)) {
			return false;
		}

		// 含まれる値のチェック (空欄の場合は無制限)
		if (!empty($include)) {
			$includeFound = false;
			foreach ($record as $value) {
				if (strpos($value, $include) !== false) {
					$includeFound = true;
					break;
				}
			}
			if (!$includeFound) {
				return false;
			}
		}

		// 除外される値のチェック (空欄の場合は無制限)
		if (!empty($exclude)) {
			foreach ($record as $value) {
				if (strpos($value, $exclude) !== false) {
					return false;
				}
			}
		}

		return true;
	});
}

// アクセス解析サマリー作成
function countValues($data, $key)
{
	$counts = array();
	foreach ($data as $record) {
		if (isset($record[$key])) {
			$value = $record[$key];
			if (!isset($counts[$value])) {
				$counts[$value] = 0;
			}
			$counts[$value]++;
		}
	}
	return $counts;
}




//環境がphp7で8のデフォルト関数が動かないため
/*
function array_key_first($array)
{
	foreach ($array as $key => $value) {
		return $key;
	}
	return null;
}
function array_key_last($array)
{
	if (!is_array($array) || empty($array)) {
		return null;
	}

	end($array);
	return key($array);
}
*/



function meta_info()
{
	$a['top']['description'] = '当たる!!と話題の無料タロット占い。今日の運勢から誕生日占い、イエスノー占いまで～ハワイのマナ[エネルギー]がたくさん込められた「ホロホロタロット」が本来のあなたの姿・未来の可能性について教えてくれます。';
	$a['top']['keyword'] = 'タロット占い,無料,恋愛,結婚,人生,相性,今日の運勢,誕生日占い,イエスノー占い,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category_group']['renai']['description'] = '44枚のタロットで恋愛占い│片思い中の相手の気持ちが知りたい…両思いの恋の行方は…!?気になるあなたの未来をホロホロタロットで占ってみましょう！';
	$a['category_group']['renai']['keyword'] = 'タロット占い,無料,恋愛,相手の気持ち,本心,欲望,結婚願望,私の存在,心の距離,ライバル,2人の現状,恋運気,夜の相性,起こる出来事,起こる変化,アプローチ,告白,2人の将来,運命,未来,恋の結末,恋の行方,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category_group']['kekkon']['description'] = '44枚のタロットで結婚占い│運命の結婚相手にはいつ出会う？結婚相手の特徴・お付き合い中のカレとの将来まで…ホロホロタロットがあなたの可能性をズバリ紐解いて行きます。';
	$a['category_group']['kekkon']['keyword'] = 'タロット占い,無料,結婚,出会い,結婚相手,生涯の伴侶,入籍日,結婚運,幸せな結婚,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category_group']['jinsei']['description'] = '44枚のタロットで人生占い│アナタは今どのような運気の中にいる？あなたが迎える転機・将来の仕事・人間関係まで…ホロホロタロットは未来のあなたの可能性を占います。';
	$a['category_group']['jinsei']['keyword'] = 'タロット占い,無料,人生,運命,晩年,近未来,将来,恋愛運,仕事運,対人運,財運,才能,分岐点,変化,転機,起こる出来事,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['ryouomoi']['description'] = '気になる彼と本当に両想いなのか気になりませんか？相手の気持ち・2人の将来や未来の恋の行方を、完全無料のホロホロタロット占いで読み解いていきましょう。';
	$a['category']['ryouomoi']['keyword'] = 'タロット占い,無料,恋愛,両思い,相手の気持ち,2人の将来,恋の行方,ライバル,未来,本心,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['kataomoi']['description'] = '片思い中の彼の本心がわからず不安と期待でいっぱいなあなたへ～完全無料のホロホロタロット占いでは、あなたの現状から紐解くあの人との関係、未来の可能性について占って行きます。';
	$a['category']['kataomoi']['keyword'] = 'タロット占い,無料,恋愛,片思い,相手の気持ち,2人の現状,恋の行方,ライバル,未来,本心,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['aitenokimochi']['description'] = '大好きなあの人は私のことをどう思っている？相手の気持ちを考えると不安で眠れない…完全無料のホロホロタロット占いがあなたの本来あるべき姿からあの人の本心を占います。';
	$a['category']['aitenokimochi']['keyword'] = 'タロット占い,無料,恋愛,相手の気持ち,不安,2人の現状,恋の行方,未来,本心,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['furin']['description'] = '不倫中のあの人の愛は本当なの？2人の恋愛が成就する可能性を知りたい…完全無料のホロホロタロット占いがあなたの現状と未来の運命を占います。';
	$a['category']['furin']['keyword'] = 'タロット占い,無料,恋愛,不倫,離婚,相手の気持ち,成就,未来,運命,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['yorunoaishou']['description'] = '彼があなたに抱く欲望・夜の相性を徹底解説!!完全無料のホロホロタロット占いでは、あの人との夜の過ごし方や2人の未来の関係までを愛溢れるメッセージでお届けします。';
	$a['category']['yorunoaishou']['keyword'] = 'タロット占い,無料,恋愛,夜の相性,欲望,大人の恋,未来,関係,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['fukuen']['description'] = 'あの人と復縁したい、もう一度やり直したい方必見!!完全無料のホロホロタロット占いで、復縁の可能性や転機・相手の気持ちを読み解いていきましょう。';
	$a['category']['fukuen']['keyword'] = 'タロット占い,無料,恋愛,復縁,可能性,相手の気持ち,転機,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['kekkon']['description'] = '私の結婚の可能性は？結婚につながる出会いが無い人必見!!完全無料のホロホロタロット占いで、あなたの持つ魅力から運命の相手との出会いの可能性について占ってみましょう。';
	$a['category']['kekkon']['keyword'] = 'タロット占い,無料,結婚,出会い,運命の相手,可能性,未来,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['deai']['description'] = 'あなたは運命の相手と、いつ・どんな場所で出会うのでしょう？完全無料のホロホロタロット占いでは、相手の特徴や出会うきっかけ、具体的な結婚の時期などをお伝えします。';
	$a['category']['deai']['keyword'] = 'タロット占い,無料,結婚,出会い,運命の相手,特徴,場所,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['jinsei']['description'] = '自分らしい幸せな人生を過ごそう!!完全無料のホロホロタロット占いでは、あなたの本質・才能、未来に訪れる転機、財運・仕事運などをまるっと占います。';
	$a['category']['jinsei']['keyword'] = 'タロット占い,無料,人生,未来,転機,財運,金運,仕事運,人間関係,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['category']['sigoto']['description'] = '今の仕事は本当に自分に合っている？未来の自分の姿が知りたい…完全無料のホロホロタロット占いで、あなたの仕事運や人間関係、適職・転職の時期などを占ってみましょう。';
	$a['category']['sigoto']['keyword'] = 'タロット占い,無料,人生,仕事,人間関係,転職,適職,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['today']['description'] = '毎日カードを1枚引くだけの簡単タロット占い、今日のラッキー度から一日の過ごし方・気をつけることなど、今日の運勢を総合的にアドバイス。ハワイ語で「幸運」の意味を持つ「ラキ」タロットで、毎日をHappyに過ごそう!!';
	$a['today']['keyword'] = '今日の運勢,mm月dd日,総合運,ラッキー度,毎日,簡単,タロット占い,無料,恋愛,結婚,人生,相性,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['birthday']['entry']['description'] = '誕生日からアナタを表す1枚のタロットカードを導き出します。そのカードから誕生日が持つ365通りの宿命、3つの強みなど知ることができます。自分が生まれ持った運命を知ってください。';
	$a['birthday']['entry']['keyword'] = 'タロット占い,無料,365日,誕生日占い,ホロホロタロット,holoholoタロット,ハワイアンタロット,宿命,強み,幸運アイテム,相性の良い誕生日,同じ誕生日の有名人';
	$a['birthday']['card']['description'] = '365日タロット占い。mm月生まれのタロットカード一覧です。誕生日のカードから読み解くアナタの宿命や生まれ持った強み、その日にまつわる全てを多方面から知ることができます。';
	$a['birthday']['card']['keyword'] = 'タロット占い,無料,365日,誕生日占い,ホロホロタロット,holoholoタロット,ハワイアンタロット,1月,2月,3月,4月,5月,6月,7月,8月,9月,10月,11月,12月';
	$a['birthday']['result']['description'] = '365日タロット占い。mm月dd日生まれのアナタのタロットカードです。誕生日のカードから読み解く宿命や生まれ持った強み、その日にまつわる全てを多方面から知ることができます。';
	$a['birthday']['result']['keyword'] = 'タロット占い,無料,365日,誕生日占い,ホロホロタロット,holoholoタロット,ハワイアンタロット,宿命,強み,幸運アイテム,相性の良い誕生日,同じ誕生日の有名人';
	$a['yesno']['entry']['description'] = '質問（悩み）の答えをYes No（イエスノー）でズバリ解決！相手の気持ちや自分の本音、悩みを解決するヒントなど…白黒ハッキリしたい方にオススメのタロット占い。';
	$a['yesno']['entry']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['kataomoi']['description'] = 'この恋の行方・あの人の本心を知りたい片思い中のあなたへ～当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['kataomoi']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,片思い,恋の行方,本心,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['wakare']['description'] = '今の関係を続けるべき？夫と離婚してよい？当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['wakare']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,別れ,離婚,関係,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['kekkon']['description'] = 'あの人は運命の相手？結婚のタイミングについて知りたいあなたへ～当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['kekkon']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,結婚,運命,タイミング,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['aisho']['description'] = '気になるあの人との相性は良い？悪い？本心が知りたいあなたへ～当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['aisho']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,2人の相性,本心,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['furin']['description'] = '恋人の行動がアヤシイ…浮気しているかも？この恋の結末は別れor結婚？当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['furin']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,不倫,浮気,恋の結末,運命,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['anohito']['description'] = 'あの人は本当に私を愛してくれている？本心が知りたいあなたへ～当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['anohito']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,相手の気持ち,本心,恋の結末,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['deai']['description'] = 'あなたの未来にはどんな運命の相手が現れるのか…その時期は？当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['deai']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,出会い,未来,運命,時期,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['yesno']['fukuen']['description'] = '別れたあの人とヨリを戻せる？今でもあなたのことが好きなのでしょうか？当たる!と評判のホロホロ「Yes No（イエスノー）タロット」で占ってみましょう。';
	$a['yesno']['fukuen']['keyword'] = 'イエス・ノー占い,イエスノー占い,Yes No占い,当たる,失恋,復縁,別れ,未練,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['terms']['description'] = '【完全無料】ホロホロタロット占い 愛と癒しのハワイアン・タロットへようこそ。当サイトの利用規約についてご紹介します。';
	$a['terms']['keyword'] = '利用規約,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['privacy']['description'] = '【完全無料】ホロホロタロット占い 愛と癒しのハワイアン・タロットへようこそ。当サイトのプライバシーポリシーについてご紹介します。';
	$a['privacy']['keyword'] = 'プライバシーポリシー,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	$a['sitemap']['description'] = '【完全無料】ホロホロタロット占い 愛と癒しのハワイアン・タロットへようこそ。当サイトのサイトマップについてご紹介します。';
	$a['sitemap']['keyword'] = 'サイトマップ,タロット占い,無料,ホロホロタロット,holoholoタロット,ハワイアンタロット';
	return $a;
}
