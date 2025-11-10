<?php require_once('../template/parts/head.php'); ?>
<body>
<?php require_once('../template/parts/site_header.php'); ?>
<div class="entry">
<div class="contents_title">
	<?php echo $contents_data[$cid]['name']; ?>
</div>

<div class="contents_caption">
	<?php echo $contents_data[$cid]['caption']; ?>
</div>

<ol class="menu_name_list">
	<div class="intro">
		このメニューで鑑定する内容
	</div>
	<?php foreach($menu_data[$cid] as $val): ?>
		<li class="item">
			<?php echo $val['name'] ?>
		</li>
	<?php endforeach; ?>
</ol><!-- /.menu_name_list -->


<a class="button" href="<?php echo SERVICE_URL; ?>result/?cid=<?php echo $cid; ?>">
	占う
</a>
</div><!-- /.entry -->

<div class="recommend_title">その他の鑑定</div>
<div class="recommend">
	<?php require_once('../template/parts/menu_list.php'); ?>
</div><!-- /.recommend -->


</body>
</html>
