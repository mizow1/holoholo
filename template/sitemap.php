<?php $page_name = 'サイトマップ'; ?>
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

		<div class="section rounded_box">
			<div class="heading deco">
				<h1 class="heading_title">サイトマップ</h1>
			</div>
			
			<ul>
				<li>
					<a href="<?php echo SERVICE_URL ?>renai/">恋愛タロット占い</a>
					<ul>
						<li>
							<a href="<?php echo SERVICE_URL ?>renai/ryouomoi/">両思いタロット占い</a>
						</li>
						<li>
							<a href="<?php echo SERVICE_URL ?>renai/kataomoi/">片思いタロット占い</a>
						</li>
						<li>
							<a href="<?php echo SERVICE_URL ?>renai/aitenokimochi/">相手の気持ちタロット占い</a>
						</li>
						<li>
							<a href="<?php echo SERVICE_URL ?>renai/furin/">不倫タロット占い</a>
						</li>
						<li>
							<a href="<?php echo SERVICE_URL ?>renai/yorunoaishou/">夜の相性タロット占い</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>kekkon/">結婚タロット占い</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>jinsei/">人生タロット占い</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>yesno/">イエスノータロット占い</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>birthday/">365日タロット占い</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>about/">「HoloHoloタロット占い」について</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>terms/">利用規約</a>
				</li>
				<li>
					<a href="<?php echo SERVICE_URL ?>privacy/">プライバシーポリシー</a>
				</li>
			</ul>
			
		</div>
	
	</div>
			

</div>
<!-- //MAIN -->

<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
