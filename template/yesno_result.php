<?php
$theme_jp = ['kataomoi'=>'片思い','wakare'=>'別れ・離婚','kekkon'=>'結婚','aisho'=>'2人の相性','anohito'=>'相手の気持ち','deai'=>'出会い','fukuen'=>'失恋・復縁'];
$page_name = 'この質問の答えは'.$the_yesno['yesno'].'│'.$theme_jp[$the_yesno['theme']].'│イエスノータロット'; ?>
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
		<li><a href="<?php echo SERVICE_URL ?>yesno/">YES・NOタロット占い</a></li>
		<li>YES・NOタロット占い鑑定結果</li>
	</ul>
	
	<div class="inner">
		
		<div class="section_yesno">
			<div class="box_card">
				<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/feature_yesno.jpg" alt="YES・NO　タロット占い"></div>
				<div class="box_card_body">
					<div class="heading deco">
						<h2 class="heading_title">悩みの答えは…</h2>
					</div>
					
					<div class="result_card">
						<div class="card_inner">
							<img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="" class="card_a">
							<img src="<?php echo SERVICE_URL ?>img/card/<?php echo $the_card_data['id']; ?>.jpg" alt="HoloHoloタロット占い　<?php echo $the_card_data['kaki']; ?>（<?php echo $the_card_data['yomi']; ?>）" class="card_b">
						</div>
					</div>
					<div class="result_card_name"><?php echo $the_card_data['kaki']; ?></div>
					
					
					<div class="heading">
						<h3 class="heading_title"><?php echo $the_card_data['kaki']; ?>（<?php echo $the_card_data['yomi']; ?>）の<br>カードの答えは</h3>
					</div>
					
					
					<div class="yesno_result_box">
						<div class="yesno_result_catch"><strong>『<?php echo $the_yesno['yesno']; ?>』</strong>です</div>
						<div class="yesno_result_text">
							<?php echo $the_yesno['result']; ?>
						</div>
						<div class="yesno_result_end"><strong>自分を信じ、希望を持ち続けてください。</strong></div>
					</div>

					<!-- ▽▽▽アンカーテキストリンク▽▽▽ -->
					<?php if($recommend_1): ?>
					<div class="pr_text pb_8">
						<a href="<?php echo $recommend_1['url'] ?>" class="underline">【<?php echo $recommend_1['category_data']['name'] ?>に悩んでいるあなたにオススメ】<br>「<?php echo $recommend_1['name'] ?>」でもっと深く追求し、幸せに導きます。</a>
					</div>
					
					<?php endif; ?>
					<!-- △△△アンカーテキストリンク△△△ -->
					
					<div class="btn_wrap">
						<a href="<?php echo SERVICE_URL ?>yesno/" class="btn btn_2">YES・NOタロット占いTOPへ</a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- //section_yesno -->
		
		<!-- ▼▼▼シェアパート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>
		<!-- ▲▲▲シェアパート▲▲▲ -->
		
		<!-- ▼▼▼関連占い▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/theme_recommend.php'); ?>
		<!-- ▲▲▲関連占い▲▲▲ -->
		
		<div class="heading deco">
			<div class="heading_catch">\ 自分を知るのが楽しくなる‼ /</div>
			<h2 class="heading_title"><span class="free_icon">無料</span>タロット占いコレクション</h2>
		</div>
		
		<!-- ▼▼▼特集メニュー（365日タロット）▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/birthday.php'); ?>
		<!-- ▲▲▲特集メニュー（365日タロット）▲▲▲ -->
		
		
		
	</div>
	<!-- //inner -->
		
	<div class="bg_sea">
		<div class="inner">
			
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
