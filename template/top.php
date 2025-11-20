<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<!-- MV -->
<div class="mv">
	<div class="mv_img"><img src="<?php echo SERVICE_URL; ?>img/mv_img.jpg" alt="ハワイの風景"></div>
	<div class="mv_item mv_catch">愛と癒しのハワイアン・タロット占い</div>
	<div class="mv_item mv_lead">～あなたらしく生きるヒントが見つかる！～</div>
	<h1 class="mv_item mv_logo"><a href="<?php echo SERVICE_URL; ?>"><img src="<?php echo SERVICE_URL; ?>img/logo.png" alt="HoloHoloタロット占い【完全無料】"></a></h1>
	<div class="mv_item mv_item_1"><img src="<?php echo SERVICE_URL; ?>img/mv_ship.png" alt="船"></div>
	<div class="mv_item mv_item_2"><img src="<?php echo SERVICE_URL; ?>img/mv_tree.gif" alt="ヤシの木"></div>
	<div class="mv_item mv_item_3"><img src="<?php echo SERVICE_URL; ?>img/mv_starfish.gif" alt="ヒトデ"></div>
	<div class="mv_item mv_item_4"><img src="<?php echo SERVICE_URL; ?>img/mv_flower.gif" alt="ハワイの花"></div>
	<div class="mv_item mv_item_5"><a href="<?php echo SERVICE_URL; ?>menu/" title="メニュー一覧"><img src="<?php echo SERVICE_URL; ?>img/mv_turtle.gif" alt="ウミガメ"></a></div>
	<div class="mv_item mv_item_6"><img src="<?php echo SERVICE_URL; ?>img/mv_radio.gif" alt="ラジオ"></div>
	<div class="mv_item mv_item_7 dispnone"><img src="<?php echo SERVICE_URL; ?>img/mv_chara.png" alt="HoloHoloキャラクター"></div>
	<div class="mv_item mv_item_8 dispnone"><img src="<?php echo SERVICE_URL; ?>img/mv_music.png" alt="MUSIC ON/OFF"></div>
</div>
<!-- //MV -->
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<!-- GNAV -->
<?php require_once(SERVICE_PATH.'template/parts/gnav.php'); ?>
<!-- //GNAV -->
	
<!-- MAIN -->
<div class="main">
	<div class="bg_sea">
		<div class="inner">

			<!-- ▼▼▼今日のラキタロット▼▼▼ -->
			<div class="section rounded_box" id="today">
				<div class="section_icon">
					<div class="section_icon_item">今日の運勢</div>
				</div>

				<div class="heading deco">
					<div class="heading_catch">\ 毎日のタロット～あなたに必要なものは？ /</div>
					<h2 class="heading_title">今日の運勢＂ラキタロット＂</h2>
				</div>
				
				<div class="spread_laki">
					<div class="spread_laki_img"><img src="<?php echo SERVICE_URL; ?>img/spread_img.jpg" alt="今日のラキ(運)タロット占い" loading="lazy"></div>
					<div class="spread_laki_item card_1"><a href="<?php echo SERVICE_URL.'today/?card=1'; ?>"><img src="<?php echo SERVICE_URL; ?>img/today_laki_card.png" alt="HoloHoloタロット占い" loading="lazy"></a></div>
					<div class="spread_laki_item card_2"><a href="<?php echo SERVICE_URL.'today/?card=2'; ?>"><img src="<?php echo SERVICE_URL; ?>img/today_laki_card.png" alt="HoloHoloタロット占い" loading="lazy"></a></div>
					<div class="spread_laki_item card_3"><a href="<?php echo SERVICE_URL.'today/?card=3'; ?>"><img src="<?php echo SERVICE_URL; ?>img/today_laki_card.png" alt="HoloHoloタロット占い" loading="lazy"></a></div>
					<div class="spread_laki_item card_4"><a href="<?php echo SERVICE_URL.'today/?card=4'; ?>"><img src="<?php echo SERVICE_URL; ?>img/today_laki_card.png" alt="HoloHoloタロット占い" loading="lazy"></a></div>
				</div>
				
				<p class="align_center">今日の気分は…？<br>ピンときたカードを選んでね。</p>
			</div>
			<!-- ▲▲▲今日のラキタロット▲▲▲ -->

			<!-- ▼▼▼新着タロット占い▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/new.php'); ?>
			<!-- ▲▲▲新着タロット占い▲▲▲ -->

			<!-- ▼▼▼口コミ▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/comment.php'); ?>
			<!-- ▲▲▲口コミ▲▲▲ -->

			<!-- ▼▼▼話題のキーワード▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/keyword.php'); ?>
			<!-- ▲▲▲話題のキーワード▲▲▲ -->

			<!-- ▼▼▼おすすめ▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/recommend.php'); ?>
			<!-- ▲▲▲おすすめ▲▲▲ -->

			<!-- ▼▼▼おすすめ（片思い占いタロット）▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/recommend_theme_1.php'); ?>
			<!-- ▲▲▲おすすめ（片思い占いタロット）▲▲▲ -->

			<!-- ▼▼▼おすすめ（相性占いタロット）▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/recommend_theme_2.php'); ?>
			<!-- ▲▲▲おすすめ（相性占いタロット）▲▲▲ -->

			<!-- ▼▼▼ランキング▼▼▼ -->
			<?php require_once(SERVICE_PATH.'template/parts/popular.php'); ?>
			<!-- ▲▲▲ランキング▲▲▲ -->
		</div>
		<!-- //inner -->
	</div>
	<!-- //bg_sea -->


	<div class="inner pt_4">
		
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
				<div class="box_card_img"><a href="<?php echo SERVICE_URL ?>birthday/"><img src="<?php echo SERVICE_URL; ?>img/feature_365.jpg" alt="誕生日からあなたの運命を読み解く　365日タロット占い" loading="lazy"></a></div>
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
				<div class="box_card_img"><a href="<?php echo SERVICE_URL ?>yesno/"><img src="<?php echo SERVICE_URL; ?>img/feature_yesno.jpg" alt="YES・NO　タロット占い" loading="lazy"></a></div>
				<div class="box_card_body">
					あなたが今抱える悩みを<br>YESかNOではっきりとお答えします♪
				</div>
			</div>
		</div>
		<!-- ▲▲▲特集メニュー（YESNOタロット）▲▲▲ -->

		
		
		<!-- ▼▼▼HoloHolo Live▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/live.php'); ?>
		<!-- ▲▲▲HoloHolo Live▲▲▲ -->
		
		
		<!-- ▼▼▼ここからカテゴリメニュー▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/category_summary.php'); ?>
		<!-- ▲▲▲ここまでカテゴリメニュー▲▲▲ -->
		
	</div>
	<!-- //inner -->
		
	<?php require_once(SERVICE_PATH.'template/parts/closing.php'); ?>
</div>
<!-- //MAIN -->


<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->


</div>
<script src="<?php echo SERVICE_URL ?>js/today_spread.js"></script>
</body>
</html>
