<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>URLアクセス解析グラフ</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<style>
  body,html{
    height: 300%;
  }
  canvas{
    width: 100%;
    height: 300%;
  }
</style>
</head>
<body>
<?php require_once SERVICE_PATH.'template/parts/pv_gnav.php'?>
<form id="dateRangeForm">
    <label for="startDate">開始日:</label>
    <input type="date" id="startDate" name="startDate" required>
    
    <label for="endDate">終了日:</label>
    <input type="date" id="endDate" name="endDate" required>

    <label for="include">URLに含む文字列:</label>
    <input type="text" id="include" name="include">

    <input type="submit" value="データを取得">
</form>
<a href=""></a>
<canvas id="urlAccessGraph"></canvas>
<script src="<?php echo SERVICE_URL ?>graph/page/graph.js"></script>
</body>
</html>
