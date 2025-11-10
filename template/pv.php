<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PV</title>
	<link rel="stylesheet" type="text/css" href="<?php echo SERVICE_URL ?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVICE_URL ?>css/pv.css">
	<script src="<?php echo SERVICE_URL ?>js/pv.css"></script>
</head>
<body>
	<?php require_once SERVICE_PATH.'template/parts/pv_gnav.php'?>
	<div class="wrap">
		<form action="">
			<div>
				<input type="text" name="start_year" value="<?php echo $start_year ?>">年
				<input type="text" name="start_month" value="<?php echo $start_month ?>">月
				<input type="text" name="start_day" value="<?php echo $start_day ?>">日
			</div>
			～
			<div>
				<input type="text" name="end_year" value="<?php echo $end_year ?>">年
				<input type="text" name="end_month" value="<?php echo $end_month ?>">月
				<input type="text" name="end_day" value="<?php echo $end_day ?>">日
			</div>
			<input type="text" name="include" value="<?php echo $include ?>">を含む
			<input type="text" name="exclude" value="<?php echo $exclude ?>">を含まない
			<input type="submit">
		</form>

		<div class="record_list">
			<div class="total_pv">
				合計：<?php echo count($raw); ?>PV
			</div>
			<table>
				<tr>
					<th>
						<a href="?key=date">年月日<span>▼</span></a>
					</th>
					<th>
						<a href="?key=ip">ユーザー<span>▼</span></a>
					</th>
					<th>
						<a href="?key=url">URL<span>▼</span></a>
					</th>
				</tr>
				<?php foreach($raw as $val): ?>
				<tr>
					<td>
						<?php echo $val['date'] ?>
					</td>
					<td>
						<?php echo $val['ip'] ?>
					</td>
					<td>
						<a href="<?php echo SERVICE_URL.$val['url'] ?>" target="_blank">
						<?php echo $val['url'] ?>
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
				</table>
		</div><!-- /.record_list -->

		<div class="record_summary">

			<?php foreach($record_summary as $key=>$val): ?>
			<div class="item item_<?php echo $key ?>">
				<table>
					<tr>
						<td colspan="2">
							<?php echo $summary_sum[$key]['key_sum'] ?>件、
							<?php if($key!='date'): //dateの平均PVを求めるなら値のない時間も含めないと意味がないためdateの平均は表示しない ?>
							PV平均：<?php echo $summary_sum[$key]['average'] ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>値</th>
						<td>PV</td>
					</tr>
					<?php foreach($val as $val2): ?>
						<tr>
							<td>
								<?php echo $val2['value'] ?>
							</td>
							<td>
								<?php echo $val2['count'] ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div><!-- /.item_1 -->
			<?php endforeach; ?>

		</div>
		<!-- /.record_summary -->
	</div>
	<!-- /.wrap -->
	
<a href="<?php echo SERVICE_URL ?>holoholo_access_log.csv" download>元データダウンロード</a>
</body>
</html>