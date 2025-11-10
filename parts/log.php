<?php
// ログを記録するCSVファイルのパス
$logFile = SERVICE_PATH.'holoholo_access_log.csv';
// ログに記録する情報を取得
$url = $_SERVER['REQUEST_URI'];

// $ip = $_SERVER['REMOTE_ADDR'];
if (!isset($_COOKIE['user_id'])) {
	$ip = intval(uniqid(), 16);
	setcookie('user_id', $ip, strtotime('+1 year'));//同一IDは1年間同一人物とみなす
} else {
	$ip = $_COOKIE['user_id'];
}

$datetime = date('Y-m-d H:i:s');
$postData = file_get_contents('php://input');

// ログの内容を結合
$logEntry = "$datetime,$ip,$url,$postData\n";

// ログファイルに追記
file_put_contents($logFile, $logEntry, FILE_APPEND);
?>
