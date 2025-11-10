<?php 
$category_page_title['kataomoi']='片思い中の';
$category_page_title['wakare']='別れ・離婚の';
$category_page_title['kekkon']='結婚の';
$category_page_title['aisho']='2人の相性に関する';
$category_page_title['furin']='不倫・浮気の';
$category_page_title['anohito']='相手の気持で悩む人の';
$category_page_title['deai']='出会いの';
$category_page_title['fukuen']='失恋・復縁の';

$page_name = $category_page_title[$yesno_theme].'悩み・質問の答えをイエスノータロットで占う';
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
		<li><a href="<?php echo SERVICE_URL ?>yesno/">YES・NOタロット占い</a></li>
		<li><?php echo $page_name ?></li>
	</ul>
	
	<div class="inner">
		
		<div class="section_yesno">
			<div class="box_card">
				<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/feature_yesno.jpg" alt="YES・NO　タロット占い"></div>
				<div class="box_card_body">
					<div class="heading">
						<h2 class="heading_title">悩み・質問を心に浮かべたら<br>タロットカードを1枚選びましょう</h2>
					</div>
					
					<div class="spread_yesno">
						<div class="spread_yesno_img"><img src="<?php echo SERVICE_URL ?>img/spread_img.jpg" alt="今日のラキ(運)タロット占い"></div>
						<div class="card_wrapper">
							<div class="spread_yesno_item card_1 spread_yesno_item_start"><a href="<?php echo SERVICE_URL ?>yesno/result/?select_id=1"><img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="HoloHoloタロット占い"></a></div>
							<div class="spread_yesno_item card_2 spread_yesno_item_start"><a href="<?php echo SERVICE_URL ?>yesno/result/?select_id=2"><img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="HoloHoloタロット占い"></a></div>
							<div class="spread_yesno_item card_3 spread_yesno_item_start"><a href="<?php echo SERVICE_URL ?>yesno/result/?select_id=3"><img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="HoloHoloタロット占い"></a></div>
						</div>
					</div>
					
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
<script src="<?php echo SERVICE_URL ?>js/yesno.js"></script>
</body>
</html>
