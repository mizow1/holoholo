document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('dateRangeForm');

  // デフォルトの日付範囲を設定
  const endDate = new Date();
  const startDate = new Date();
  startDate.setMonth(startDate.getMonth() - 1);

  form.startDate.value = startDate.toISOString().split('T')[0];
  form.endDate.value = endDate.toISOString().split('T')[0];

  // フォームのサブミットイベントハンドラ
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    const startDate = form.startDate.value;
    const endDate = form.endDate.value;
    const include = form.include.value;

    // データを取得してグラフを描画
    fetchAndDrawGraph(startDate, endDate, include);
  });

  // 初期グラフを描画
  form.dispatchEvent(new Event('submit'));
});

function fetchAndDrawGraph(startDate, endDate, include) {
  fetch(`backend.php?startDate=${startDate}&endDate=${endDate}&include=${encodeURIComponent(include)}`)
  .then(response => response.json())
  .then(urlCounts => {
    drawUrlGraph(urlCounts);
  })
  .catch(error => {
    console.error('エラーが発生しました:', error);
  });
}

function drawUrlGraph(urlCounts) {
  const ctx = document.getElementById('urlAccessGraph').getContext('2d');
  const urls = Object.keys(urlCounts);
  const counts = Object.values(urlCounts);

  if (window.urlChart) {
    window.urlChart.destroy();
  }

  window.urlChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: urls,
      datasets: [{
        label: 'OWのIPを除くアクセス数',
        data: counts,
        backgroundColor: 'rgba(75, 192, 192, 0.5)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          categoryPercentage: 0.8,
          barPercentage: 0.9
        }]
      },
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: true
      },
      title: {
        display: true,
        text: 'OWのIPを除くURL別アクセス数'
      }
    }
  });
}
