<?php
// CSVファイルのパス
$csvFilePath = 'holoholo_access_log.csv';
// 指定されたIPアドレスを除外
$excludedIp = '122.213.201.14';

// CSVデータを読み込む
$rows = array_map('str_getcsv', file($csvFilePath));
$header = array_shift($rows); // ヘッダー行を除去

// 日別と時間別のデータを集計する関数
function aggregateData($rows, $excludedIp) {
    $dateCounts = $hourCounts = [];

    foreach ($rows as $row) {
        if ($row[1] === $excludedIp) continue; // 特定のIPを除外
        $date = substr($row[0], 0, 10); // 日付部分
        $hour = substr($row[0], 11, 2); // 時間部分

        // 日別の集計
        if (!isset($dateCounts[$date])) {
            $dateCounts[$date] = 0;
        }
        $dateCounts[$date]++;

        // 時間別の集計
        $hourKey = $date . ' ' . $hour . ':00:00';
        if (!isset($hourCounts[$hourKey])) {
            $hourCounts[$hourKey] = 0;
        }
        $hourCounts[$hourKey]++;
    }

    // 時系列順にソート
    ksort($dateCounts);
    ksort($hourCounts);

    return [
        'byDay' => ['labels' => array_keys($dateCounts), 'data' => array_values($dateCounts)],
        'byHour' => ['labels' => array_keys($hourCounts), 'data' => array_values($hourCounts)]
    ];
}

// 集計データの取得
$aggregatedData = aggregateData($rows, $excludedIp);

// JSON形式で出力
header('Content-Type: application/json');
echo json_encode($aggregatedData);
?>
