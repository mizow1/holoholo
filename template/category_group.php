<?php
$page_name = $the_category_group_data['name'].'タロット占い';

$page_name_category['renai'] = '恋愛占い';
$page_name_category['kekkon'] = '結婚占い';
$page_name_category['jinsei'] = '人生占い';
$page_name = $page_name_category[$the_category_data['name_e']]?$page_name_category[$the_category_data['name_e']]:$the_category_group_data['name'].'占い';

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
		<li><?php echo $the_category_group_data['name'] ?>タロット占い</li>
	</ul>
		
	<div class="section section_category_top mt_4 mb_4">
		<div class="section_icon">
			<div class="section_icon_item"><?php echo $the_category_group_data['name'] ?>占い</div>
			<div class="section_icon_item"><a href="<?php echo SERVICE_URL ?>keyword/?keyword=無料占い">無料占い</a></div>
		</div>
		<div class="box_card">
			<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/category_head/<?php echo $the_category_group_data['name_e'] ?>.jpg" alt="<?php echo $the_category_group_data['name'] ?>タロット占い"></div>
		</div>
		
		<div class="tile_menu">
			<?php foreach($category_data as $val): ?>
			<?php if($val['category_group_name_e']==$the_category_group_data['name_e']&&$category_count[$val['name_e']]>0&&$valid_category[$val['name_e']]): ?>
			<div class="tile_menu_item">
				<a href="<?php echo SERVICE_URL.$val['category_group_name_e'].'/'.$val['name_e'].'/' ?>">
					<h3 class="tile_menu_img"><img src="<?php echo SERVICE_URL ?>img/category_top/<?php echo $val['name_e'] ?>.jpg" alt="<?php echo $val['name'] ?>タロット占い"></h3>
				</a>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<!-- //tile_menu -->
	</div>
		
	<div class="inner">
		<div class="category_catch">\ こんな<?php echo $the_category_group_data['name'] ?>の悩みの人がよく占っています /</div>
		<div class="category_caption">
			<?php echo $nayami[$the_category_group_data['name_e']] ?>
		</div>
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

			<?php require_once(SERVICE_PATH.'template/parts/menu_list.php'); ?>
		</div>
		<!-- //inner -->
	</div>
	<!-- //bg_sea -->	
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>

</div>
<!-- //MAIN -->

<!--<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>-->

<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>

</div>
</body>
</html>
