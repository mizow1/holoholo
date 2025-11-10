<?php
$csvFile = '../../holoholo_access_log.csv';
$data = [];
$ignoreIp = '122.213.201.14';
$startDate = $_GET['start'] ?? date('Y-m-d', strtotime('-1 month')); // デフォルトは1ヶ月前
$endDate = $_GET['end'] ?? date('Y-m-d'); // デフォルトは今日

if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $timestamp = strtotime(explode(' ', $row[0])[0]);
        $date = date('Y-m-d', $timestamp);
        $hour = date('H', $timestamp);
        $ip = $row[1];

        if ($ip == $ignoreIp) continue;

        // 開始日と終了日の範囲内のデータのみを処理
        if ($date >= $startDate && $date <= $endDate) {
            if (!isset($data[$date])) {
                $data[$date] = array_fill(0, 24, 0); // 24時間分の配列を0で初期化
            }
            $data[$date][$hour]++;
        }
    }
    fclose($handle);
}

// 時間別データを日別データに変換
$aggregateData = array_map('array_sum', $data);

// レスポンスをJSON形式で返す
header('Content-Type: application/json');
echo json_encode(['daily' => $aggregateData, 'hourly' => $data]);
?>
