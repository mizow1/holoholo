<?php $page_name = '365日タロット占い'.$month.'月生まれのタロットカード'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	

<!-- MAIN -->
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
		<li><a href="<?php echo SERVICE_URL ?>birthday/">365日タロット占い</a></li>
		<li><?php echo $month ?>月生まれのタロットカード</li>
	</ul>
	
	<div class="inner">
		
		<!-- ▼▼▼カードリスト▼▼▼ -->
		<div class="rounded_box section_result_item">
			<div class="heading deco">
				<h2 class="heading_title"><?php echo $month; ?>月生まれのタロットカード</h2>
			</div>
			<ul class="card_list">
				<?php foreach($the_birthday_data as $val): ?>
				<li>
					<a href="<?php echo SERVICE_URL ?>birthday/result/?month=<?php echo $month ?>&day=<?php echo $val['day'] ?>">
						<img src="<?php echo SERVICE_URL ?>img/card/<?php echo $val['card_id'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $card_data[$val['card_id']]['kaki'] ?>（<?php echo $card_data[$val['card_id']]['yomi'] ?>）"><br>
						<?php echo $val['day'] ?>日
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- ▲▲▲カードリスト▲▲▲ -->
		
		<!-- ▼▼▼誕生日選択パート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/birthday_list.php'); ?>
		<!-- ▲▲▲誕生日選択パート▲▲▲ -->
		
		<div class="btn_wrap">
			<a href="<?php echo SERVICE_URL ?>birthday/" class="btn btn_2 btn_fix">365日タロット占いTOPへ</a>
		</div>
		
		
	</div>
	<!-- //inner -->
		
		
		
		
		
		
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>


</div>
<!-- //MAIN -->

<div class="page_top" id="js_pagetop"><div class="page_top_icon"><i class="fa-solid fa-arrow-up"></i><div class="page_top_text">TOP</div></div></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
