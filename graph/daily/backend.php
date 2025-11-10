<?php
$csvFile = '../../holoholo_access_log.csv';
$dailyData = [];
$hourlyData = [];
$ignoreIp = '122.213.201.14';
$startDate = $_GET['start'] ?? date('Y-m-d', strtotime('-1 month')); // デフォルトは1ヶ月前
$endDate = $_GET['end'] ?? date('Y-m-d'); // デフォルトは今日
$all = [];
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $timestamp = strtotime($row[0]);
        $date = date('Y-m-d', $timestamp);
        $hour = date('H', $timestamp);
        $dateTimeKey = $date . ' ' . $hour . ':00:00'; // 日付と時間のキーを作成
        $ip = $row[1];

        if ($ip == $ignoreIp) continue;

        if ($date >= $startDate && $date <= $endDate) {
            // 時間別データの集計
            if (!isset($hourlyData[$dateTimeKey])) {
                $hourlyData[$dateTimeKey] = 0;
            }
            $hourlyData[$dateTimeKey]++;

            // 日付別データの集計
            if (!isset($dailyData[$date])) {
                $dailyData[$date] = 0;
            }
            $dailyData[$date]++;


        }
    }
    fclose($handle);
}

header('Content-Type: application/json');
echo json_encode(['daily' => $dailyData, 'hourly' => $hourlyData]);
?>
