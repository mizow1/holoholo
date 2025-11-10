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
	

	
	<div class="inner">
		
		<!-- ▼▼▼レビューパート▼▼▼ -->
		<div class="section section_review">
			ああああ

		</div>
		<!-- ▲▲▲レビューパート▲▲▲ -->
		
		<div class="btn_wrap">
			<a href="" class="btn btn_2 btn_fix">〇〇占いをもっと占う‼</a>
		</div>

		<!-- ▼▼▼関連占い▼▼▼ -->
		<div class="section rounded_box">
			<!--<div class="section_icon">おすすめ</div>-->
			<div class="heading deco">
				<h2 class="heading_title">この鑑定をした人は<br>こんなことも占っています</h2>
			</div>
			<div class="menu_list">
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- ▲▲▲関連占い▲▲▲ -->
		
		<!-- ▼▼▼おすすめ▼▼▼ -->
		<div class="section rounded_box">
			<!--<div class="section_icon">おすすめ</div>-->
			<div class="heading deco">
				<h2 class="heading_title">あなたにおすすめの<br>無料タロット占い</h2>
			</div>
			<div class="menu_list">
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
				<div class="menu_item">
					<a href="#">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
						<div class="menu_body">
							<ul class="menu_tag"><li>恋愛占い</li><li>無料占い</li><li>恋の進展/結末</li></ul>
							<h3 class="menu_title">メニュー名を簡略化したもの</h3>
							<div class="menu_date">2023年10月10日</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- ▲▲▲おすすめ▲▲▲ -->

		<!-- ▼▼▼ランキング▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/popular.php'); ?>
		<!-- ▲▲▲ランキング▲▲▲ -->
		

		
		
		
		<!-- ▼▼▼話題のキーワード▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/keyword.php'); ?>
		<!-- ▲▲▲話題のキーワード▲▲▲ -->
		
		<!-- ▼▼▼新着タロット占い▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/new.php'); ?>
		<!-- ▲▲▲新着タロット占い▲▲▲ -->
		
		<div class="heading deco">
			<div class="heading_catch">\ 自分を知るのが楽しくなる‼ /</div>
			<h2 class="heading_title"><span class="free_icon">無料</span>タロット占いコレクション</h2>
		</div>
		
		<!-- ▼▼▼特集メニュー（365日タロット）▼▼▼ -->
		<div class="section">
			<div class="section_icon">
				<div class="section_icon_item">性格診断</div>
			</div>
			<div class="box_card">
				<div class="box_card_img"><a href="#"><img src="<?php echo SERVICE_URL ?>img/feature_365.jpg" alt="誕生日からあなたの運命を読み解く　365日タロット占い"></a></div>
				<div class="box_card_body">
					あなたが選んだHoloHoloタロットカードから、あなたの性格診断をします♪
				</div>
			</div>
		</div>
		<!-- ▲▲▲特集メニュー（365日タロット）▲▲▲ -->
		
		<!-- ▼▼▼特集メニュー（YESNOタロット）▼▼▼ -->
		<div class="section">
			<div class="section_icon">
				<div class="section_icon_item">性格診断</div>
			</div>
			<div class="box_card">
				<div class="box_card_img"><a href="#"><img src="<?php echo SERVICE_URL ?>img/feature_yesno.jpg" alt="YES・NO　タロット占い"></a></div>
				<div class="box_card_body">
					あなたが今抱える悩みを<br>YESかNOではっきりとお答えします♪
				</div>
			</div>
		</div>
		<!-- ▲▲▲特集メニュー（YESNOタロット）▲▲▲ -->
		
		<!-- ▼▼▼口コミ▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/comment.php'); ?>
		<!-- ▲▲▲口コミ▲▲▲ -->
		
		
		
	</div>
	<!-- //inner -->
		
		
		
	<?php require_once(SERVICE_PATH.'template/parts/closing.php'); ?>


</div>
<!-- //MAIN -->

<!--<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>-->

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
