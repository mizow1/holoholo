<?php
// 開始日、終了日、およびフィルターする文字列をGETパラメータから取得
$startDate = isset($_GET['startDate']) ? new DateTime($_GET['startDate']) : (new DateTime())->modify('-1 month');
$endDate = isset($_GET['endDate']) ? new DateTime($_GET['endDate']) : new DateTime();
$include = isset($_GET['include']) ? $_GET['include'] : '';
$excludeIP = '122.213.201.14';

// CSVファイルを読み込む
$filename = '../../holoholo_access_log.csv';
$urlCounts = [];

if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $datetime = new DateTime($data[0]); // 日時データが$data[0]にあると仮定
        $ip = $data[1]; // IPデータが$data[1]にあると仮定
        $url = $data[2]; // URLデータが$data[2]にあると仮定

        // 指定された日付範囲内のデータかつ、指定された文字列を含むURLのみ集計
        if ($datetime >= $startDate && $datetime <= $endDate && (!$include || strpos($url, $include) !== false)) {
            // 特定のIPアドレスを除外
            if ($ip !== $excludeIP) {
                if (!isset($urlCounts[$url])) {
                    $urlCounts[$url] = 0;
                }
                $urlCounts[$url]++;
            }
        }
    }
    fclose($handle);
}

// 件数の多い順に並べ替え
arsort($urlCounts);

// データを送信
header('Content-Type: application/json');
echo json_encode($urlCounts);
?>
