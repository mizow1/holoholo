<?php
$page_name = $the_category_data['name'].'タロット占い'.'｜'.$category_caption[$the_category_data['name_e']];
?>
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
		<li><a href="<?php echo SERVICE_URL.$the_category_group_data['name_e'].'/' ?>"><?php echo $the_category_group_data['name'] ?>タロット占い</a></li>
		<li><?php echo $the_category_data['name'] ?>タロット占い</li>
	</ul>
	
	<div class="inner">
		
		<div class="section mt_4 mb_4">
			<div class="section_icon">
				<div class="section_icon_item">恋愛占い</div>
				<div class="section_icon_item">無料占い</div>
			</div>
			<div class="box_card">
				<div class="box_card_img"><img src="<?php echo SERVICE_URL; ?>img/category_head/middle_<?php echo $the_category_data['name_e'] ?>.jpg" alt="<?php echo $the_category_data['name'] ?>タロット"></div>
			</div>
			
		</div>
		
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


<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
