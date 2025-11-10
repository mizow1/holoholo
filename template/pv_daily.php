<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アクセスログのグラフ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <style>
        /* 必要に応じてスタイルを追加 */
        body { font-family: Arial, sans-serif; }
        input, button { margin: 5px; }
        #chart-container { width: 80%; margin: 20px auto; }
    </style>
</head>
<body>
<?php require_once '/var/www/html/dev/public_html/tarot/template/parts/pv_gnav.php'?>
<div id="chart-container">
    <canvas id="myChart"></canvas>
</div>

<div>
    <label for="start">開始:</label>
    <input type="date" id="start" name="start">
    <label for="end">終了:</label>
    <input type="date" id="end" name="end">
    <button id="daily">日付別</button>
    <button id="hourly">時間別</button>
</div>
<script>
    let chart; // グローバルチャート変数
    let dailyData = {}; // 日付別データを格納するためのオブジェクト
    let hourlyData = {}; // 時間別データを格納するためのオブジェクト
    const startInput = document.getElementById('start');
    const endInput = document.getElementById('end');
    const today = new Date().toISOString().split('T')[0];
    const lastMonth = new Date(new Date().setMonth(new Date().getMonth() - 1)).toISOString().split('T')[0];

    // デフォルト値を設定
    startInput.value = lastMonth;
    endInput.value = today;

    // データを取得してグラフを描画する関数
    function fetchDataAndDrawChart() {
        const query = `?start=${startInput.value}&end=${endInput.value}`;

        fetch('backend.php' + query)
            .then(response => response.json())
            .then(result => {
                dailyData = result.daily; // 日付別データをグローバル変数に保存
                hourlyData = result.hourly; // 時間別データをグローバル変数に保存
                // 日付別のデータでグラフを描画
                drawChart(Object.keys(dailyData), Object.values(dailyData), 'day');
            });
    }

    // グラフを描画する関数
    function drawChart(labels, data, unit) {
        const ctx = document.getElementById('myChart').getContext('2d');
        if (chart) chart.destroy(); // 既存のチャートを破棄
        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'アクセス数（OW以外）',
                    data: data,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: unit
                        }
                    }
                }
            }
        });
    }

    // 初期グラフ描画
    fetchDataAndDrawChart();

    // ボタンイベント
    document.getElementById('daily').addEventListener('click', () => {
        drawChart(Object.keys(dailyData), Object.values(dailyData), 'day');
    });

    document.getElementById('hourly').addEventListener('click', () => {
        drawChart(Object.keys(hourlyData), Object.values(hourlyData), 'hour');
    });

    // 日付入力イベント
    startInput.addEventListener('change', fetchDataAndDrawChart);
    endInput.addEventListener('change', fetchDataAndDrawChart);

</script>


</body>
</html>
