<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<!-- HEADER -->
<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
<!-- //HEADER -->
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<!-- GNAV -->
<?php require_once(SERVICE_PATH.'template/parts/gnav.php'); ?>
<!-- //GNAV -->

<!-- MAIN -->
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
		<li>YES・NOタロット占い</li>
	</ul>
	
	<div class="inner">
		
		<div class="section_yesno">
			<div class="box_card">
				<div class="box_card_img"><img src="img/feature_yesno.jpg" alt="YES・NO　タロット占い"></div>
				<div class="box_card_body">
					<div class="heading">
						<h2 class="heading_title">質問の答えを<br>イエス・ノーでズバリ解決します</h2>
					</div>
					
					<div class="heading_catch pb_4">まずはじめに<br>あなたの悩み・質問に近いものを選んでね</div>
					
					<ul class="flex_list flex_list_2">
						<li><a href="yesno_entry.html">片思い</a></li>
						<li><a href="yesno_entry.html">別れ・離婚</a></li>
						<li><a href="yesno_entry.html">結婚</a></li>
						<li><a href="yesno_entry.html">2人の相性</a></li>
						<li><a href="yesno_entry.html">不倫・浮気</a></li>
						<li><a href="yesno_entry.html">相手の気持ち</a></li>
						<li><a href="yesno_entry.html">出会い</a></li>
						<li><a href="yesno_entry.html">失恋・復縁</a></li>
					</ul>
					
				</div>
			</div>
		</div>
		<!-- //section_yesno -->
		
		
		
	</div>
	<!-- //inner -->
		
		
		
		
		
		
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>

</div>
<!-- //MAIN -->


<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
