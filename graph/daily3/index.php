<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アクセスログのグラフ</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
</head>
<body>

<div>
    <canvas id="myChart"></canvas>
</div>

<label for="start">開始:</label>
<input type="date" id="start" name="start">
<label for="end">終了:</label>
<input type="date" id="end" name="end">

<button id="daily">日付別</button>
<button id="hourly">時間別</button>

<script>
const endpoint = 'backend.php';
let chart; // グローバルチャート変数

// グラフのインスタンスを破棄する関数
function destroyChart() {
    if (chart) {
        chart.destroy();
        chart = null;
    }
}

// データを取得してグラフを描画する関数
function fetchDataAndDrawChart() {
    const startDate = document.getElementById('start').value || new Date(new Date().setDate(new Date().getDate()-30)).toISOString().split('T')[0];
    const endDate = document.getElementById('end').value || new Date().toISOString().split('T')[0];
    const query = `?start=${startDate}&end=${endDate}`;

    fetch(endpoint + query)
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('myChart').getContext('2d');
            if (chart) chart.destroy(); // 既存のチャートを破棄
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(data.daily), // 日付
                    datasets: [{
                        label: 'アクセス数',
                        data: Object.values(data.daily), // 件数
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
                                unit: 'day'
                            }
                        }
                    }
                }
            });
        });
}

// 初期グラフ描画
fetchDataAndDrawChart();

// ボタンイベント
document.getElementById('daily').addEventListener('click', () => {
    if (chart && chart.data.hourly) {
        const hourlyData = [];
        Object.values(chart.data.hourly).forEach(day => hourlyData.push(...day));
        chart.data.datasets[0].data = hourlyData;
        chart.options.scales.x.time.unit = 'hour';
        chart.update();
    }
});

document.getElementById('hourly').addEventListener('click', () => {
    if (chart && chart.data.daily) {
        chart.data.datasets[0].data = Object.values(chart.data.daily);
        chart.options.scales.x.time.unit = 'day';
        chart.update();
    }
});

// 日付入力イベント
document.getElementById('start').addEventListener('change', fetchDataAndDrawChart);
document.getElementById('end').addEventListener('change', fetchDataAndDrawChart);
</script>

</body>
</html>
