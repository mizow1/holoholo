<?php $page_name = 'イエスノータロット占い│悩み・質問にYes・Noで答えます'; ?>
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
		<li><?php echo $page_name ?></li>
	</ul>
	
	<div class="inner">
		<div class="section_yesno">
			<div class="box_card">
				<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/feature_yesno.jpg" alt="YES・NO　タロット占い"></div>
				<div class="box_card_body">
					<div class="heading">
						<h2 class="heading_title">質問の答えを<br>イエス・ノーでズバリ解決します</h2>
					</div>
					
					<div class="heading_catch pb_4">まずはじめに<br>あなたの悩み・質問に近いものを選んでね</div>
					
					<ul class="flex_list flex_list_2">
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=kataomoi">片思い</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=wakare">別れ・離婚</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=kekkon">結婚</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=aisho">2人の相性</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=furin">不倫・浮気</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=anohito">相手の気持ち</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=deai">出会い</a></li>
						<li><a href="<?php echo SERVICE_URL ?>yesno/entry/?theme=fukuen">失恋・復縁</a></li>
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

<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>


</div>
</body>
</html>
