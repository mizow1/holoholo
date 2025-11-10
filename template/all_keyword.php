<?php $page_name = $keyword?'「'.$keyword.'」のタロット占い':'キーワードから探す'; ?>
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

		<!-- ▼▼▼話題のキーワード▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/keyword.php'); ?>
		<!-- ▲▲▲話題のキーワード▲▲▲ -->

		<?php if($keyword): ?>
			<h2 class="f_color_sub"><strong class="f_large">「<?php echo $keyword ?>」</strong>のタロット占い</h2>
		<?php endif; ?>
		<?php require_once(SERVICE_PATH.'template/parts/menu_list.php'); ?>
		
	</div>
	<!-- //inner -->
	
	<div class="bg_sea">
		<div class="inner">
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

		
		<?php require_once(SERVICE_PATH.'template/parts/live.php'); ?>
		
		<!-- ▼▼▼ここからカテゴリメニュー▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/category_summary.php'); ?>
		<!-- ▲▲▲ここまでカテゴリメニュー▲▲▲ -->
		
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
