<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アクセスログのグラフ</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- 日別・時間別切り替えボタン -->
<button id="byDayButton">日別</button>
<button id="byHourButton">時間別</button>

<!-- グラフを表示するためのキャンバス -->
<canvas id="accessLogChart" width="800" height="400"></canvas>

<script>
// グローバル変数
var chart; // Chart.jsのインスタンス
var chartData; // サーバーから取得したデータ

// サーバーからデータを取得してグラフを描画する関数
function fetchDataAndDrawChart() {
    fetch('graph.php') // PHPスクリプトのパスに変更
        .then(response => response.json())
        .then(data => {
            chartData = data; // 取得したデータを保存
            drawChart(chartData.byDay.labels, chartData.byDay.data, 'day'); // 初期表示は日別
        })
        .catch(error => console.error('Error:', error));
}

// グラフを描画する関数
function drawChart(labels, data, timeUnit) {
    var ctx = document.getElementById('accessLogChart').getContext('2d');
    if (chart) {
        chart.destroy(); // 既存のグラフがあれば破棄
    }
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'アクセス件数',
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
                        unit: timeUnit
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// 日別・時間別のデータでグラフを描画するイベントリスナー
document.getElementById('byDayButton').addEventListener('click', function() {
    drawChart(chartData.byDay.labels, chartData.byDay.data, 'day');
});

document.getElementById('byHourButton').addEventListener('click', function() {
    drawChart(chartData.byHour.labels, chartData.byHour.data, 'hour');
});

// ページ読み込み時にデータを取得してグラフを描画
window.onload = fetchDataAndDrawChart;
</script>

</body>
</html>
