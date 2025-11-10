<?php $page_name = '今日の運勢“ラキタロット”'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<!-- GNAV -->
<?php require_once(SERVICE_PATH.'template/parts/gnav.php'); ?>
<!-- //GNAV -->

<!-- MAIN -->
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL; ?>">HOME</a></li>
		<li><?php echo $page_name ?></li>
	</ul>
	
	<div class="inner">
		
		<div class="section rounded_box section_laki">
			<div class="section_icon">
				<div class="section_icon_item">今日の運勢</div>
			</div>
			<div class="heading deco">
				<div class="heading_catch">\ 毎日のタロット～あなたに必要なものは？ /</div>
				<h2 class="heading_title"><?php echo $page_name ?></h2>
			</div>
			<div class="result_laki_card">
				<div class="result_laki_card_img"><img src="<?php echo SERVICE_URL; ?>img/spread_img.jpg" alt=""></div>
				<div class="result_laki_card_item" id="card1">
					<div class="card_inner">
						<img src="<?php echo SERVICE_URL; ?>img/card/<?php echo $today_result['id'] ?>.jpg" alt="HoloHoloタロット占い　" class="card_a">
						<img src="<?php echo SERVICE_URL; ?>img/today_laki_card.png" alt="" class="card_b">
					</div>
				</div>
			</div>
			<div class="result_card_name">
				<?php echo $today_result['name'] ?>
			</div>
			
			
			<div class="heading">
				<div class="heading_catch">このタロットカードが示すこと</div>
				<h3 class="heading_title"><?php echo $today_result['message'] ?></h3>
			</div>

			<div class="result_text pb_8">
			<?php echo $the_card_data['detail'] ?>
			</div>
			
			<div class="heading">
				<div class="heading_catch">今日のあなたのラッキー度</div>
			</div>
			<ul class="laki_result_star">
				<?php for($i=0;$i<5;$i++): ?>
				<?php if($today_result['score']>$i): ?>
				<li><img src="<?php echo SERVICE_URL; ?>img/star_on.png" alt="★"></li>
				<?php else: ?>
				<li><img src="<?php echo SERVICE_URL; ?>img/star_off.png" alt="☆"></li>
				<?php endif; ?>
				<?php endfor; ?>
			</ul>
			
			<div class="heading">
				<div class="heading_catch">カードからのメッセージ</div>
			</div>
			<div class="laki_result_box">
				<div class="laki_result_text">
				<?php echo $today_result['body'] ?>
				</div>
			</div>
		
			<div class="btn_wrap">
				<a href="<?php echo SERVICE_URL ?>#today" class="btn btn_1 btn_fix">もう一度占う</a>
			</div>

			<div class="heading_catch mb_2">この占いでもっと人生を豊かにする？</div>
			<div class="menu_title pb_6"><a href="https://xn--100-gl4bpc8b3oocv753by8dr6skr7a.com/" class="underline" target="_blank"><strong>【おすすめPR】無料100％姓名判断で、あなたの運勢、性格、才能、良縁成就まで占います？</strong></a></div>
		</div>
		<!-- //section_laki -->
		
		
		
		<!-- ▼▼▼シェアパート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/share.php'); ?>
		<!-- ▲▲▲シェアパート▲▲▲ -->
		
		<!-- ▼▼▼新着タロット占い▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/new.php'); ?>
		<!-- ▲▲▲新着タロット占い▲▲▲ -->
		
		
	</div>
	<!-- //inner -->
		
	<div class="bg_sea">
		<div class="inner">
			
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
		<?php require_once(SERVICE_PATH.'template/parts/birthday.php'); ?>
		<!-- ▲▲▲特集メニュー（365日タロット）▲▲▲ -->
		
		<!-- ▼▼▼特集メニュー（YESNOタロット）▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/yesno.php'); ?>
		<!-- ▲▲▲特集メニュー（YESNOタロット）▲▲▲ -->
		
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
<script>
		window.addEventListener("DOMContentLoaded", function() {
			setTimeout(function() {
				flipCard("card1");
				// setTimeout(function() {
				// 	flipCard("card2");
				// 	setTimeout(function() {
				// 		flipCard("card3");
				// 	}, 100);
				// }, 100);
			}, 500);
		});

		function flipCard(cardId) {
			var cardElement = document.getElementById(cardId);
			cardElement.classList.add('flipped');
		}
	</script>

</body>
</html>
