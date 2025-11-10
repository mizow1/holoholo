<?php $page_name = '「'.$keyword.'」のタロット占い'; ?>
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
		
		<div class="search_keyword dispnone">
			<input type="text" name="kw" value="" class="search_keyword_text" placeholder="あなたの悩みを検索してみる？">
			<input type="submit" id="searchsubmit" class="search_keyword_button" value="&#xf002;">
		</div>
		
		<!-- ▼▼▼タブメニュー▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/menu_list.php'); ?>
		<!-- ▲▲▲タブメニュー▲▲▲ -->
		
		
	</div>
	<!-- //inner -->
	
<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>

</div>
<!-- //MAIN -->

<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
