<?php $page_name = $the_birthday['month'].'月'.$the_birthday['day'].'日'.'生まれのタロットカード｜365日タロット占い'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
		<li><a href="<?php echo SERVICE_URL ?>birthday/">365日タロット占い</a></li>
		<li><?php echo $the_birthday['month'] ?>月<?php echo $the_birthday['day'] ?>日生まれのあなたのタロットカード</li>
	</ul>
	
	<div class="inner">
		<div class="section_365">
			<div class="box_card">
				<div class="box_card_head">
					<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/365_img.jpg" alt="HoloHoloタロット占い　誕生日占い"></div>
					<h3 class="box_card_title"><div class="box_card_title_sub">誕生日からあなたの運命を読み解く</div>365日タロット占い</h3>
				</div>
				<div class="box_card_body">
					<div class="heading deco">
						<h2 class="heading_title"><?php echo $the_birthday['month'] ?>月<?php echo $the_birthday['day'] ?>日生まれの<br>あなたのタロットカード</h2>
					</div>
					
					<div class="result_card"><img src="<?php echo SERVICE_URL ?>img/card/<?php echo $card_data[$the_birthday['card_id']]['id'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $card_data[$the_birthday['card_id']]['name'] ?>"></div>
					<div class="result_card_name"><?php echo $card_data[$the_birthday['card_id']]['kaki'] ?>（<?php echo $card_data[$the_birthday['card_id']]['yomi'] ?>）</div>
					
					<div class="heading">
						<div class="heading_catch"><?php echo $the_birthday['month'] ?>月<?php echo $the_birthday['day'] ?>日生まれの特徴と宿命</div>
						<h3 class="heading_title"><?php echo $the_birthday['summary'] ?></h3>
					</div>
					
					<div class="result_text pb_8 align_center">
						<strong>“<?php echo $the_birthday['destiny'] ?>”</strong>
					</div>
					
					<div class="f_color_sub pb_2 align_center"><strong>【 このカードが表すキーワード 】</strong></div>
					<div class="result_text pb_8 align_center">
					<?php echo $the_birthday['keyword'] ?>
					</div>
					
					<div class="heading">
						<div class="heading_catch">そんなあなたを幸福へ導く</div>
						<h3 class="heading_title"><?php echo $the_birthday['month'] ?>月<?php echo $the_birthday['day'] ?>日生まれの<br>アロハ開運アイテム</h3>
					</div>
					<div class="result_thm"><img src="<?php echo SERVICE_URL ?>img/birthday/item_<?php echo $the_birthday['item_id'] ?>.png" alt="アロハ開運アイテム「<?php echo $the_birthday['item_name'] ?>」"></div>
					<div class="result_thm_caption">【 <?php echo $the_birthday['item_name'] ?>】</div>
					<div class="result_text pb_8">
					<?php echo $the_birthday['item_info'] ?>
					</div>
					
					<div class="heading">
						<div class="heading_catch">ファーストナンバーから知る</div>
						<h3 class="heading_title">あなたの生まれもった強み</h3>
					</div>
					<div class="result_thm"><img src="<?php echo SERVICE_URL ?>img/birthday/number_<?php echo $the_birthday['no'] ?>.jpg" alt="ファーストナンバー<?php echo $the_birthday['no'] ?>「ʻ<?php echo $the_birthday['no_name'] ?>」"></div>
					<div class="result_thm_caption">【 ʻ<?php echo $the_birthday['no_name'] ?> 】</div>
					<div class="result_text pb_8">
					<?php echo $the_birthday['strong'] ?>
					</div>
					
					<div class="heading">
						<h3 class="heading_title">同じ誕生日の有名人</h3>
					</div>
					<div class="result_text pb_8">
						<?php echo $the_birthday['celebrity'] ?>
					</div>
					
					<!-- ▽▽▽アンカーテキストリンク▽▽▽ -->
					<div class="pr_text pb_8">
						<a href="https://xn--100-gl4bpc8b3oocv753by8dr6skr7a.com/celebrity/" target="_blank" class="underline">【おすすめPR】無料100％姓名判断で、あの有名人の姓名判断を占ってみた！</a>
					</div>
					<!-- △△△アンカーテキストリンク△△△ -->
					
					<div class="heading">
						<h3 class="heading_title">相性の良いタロットカード</h3>
					</div>
					<ul class="relation_card mb_4">
						<?php foreach($the_match_card_data as $key=>$val): ?>
						<li>
							<a href="<?php echo SERVICE_URL ?>birthday/result/?month=<?php echo $the_match_birthday[$key]['month'] ?>&day=<?php echo $the_match_birthday[$key]['day'] ?>">
								<div class="relation_card_thm">
									<img src="<?php echo SERVICE_URL ?>img/card/<?php echo $val['id'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $val['kaki'] ?>（<?php echo $val['yomi'] ?>）">
								</div>
								<div class="relation_card_name"><?php echo $val['kaki'] ?> （<?php echo $val['yomi'] ?>）</div>
								<div class="relation_card_text"><?php echo $the_match_birthday[$key]['month'] ?>月<?php echo $the_match_birthday[$key]['day'] ?>日生まれ</div>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					
					<div class="btn_wrap">
						<a href="<?php echo SERVICE_URL ?>renai/aitenokimochi/" class="btn btn_2 btn_fix">相性占いを無料で占う‼</a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- //section_365 -->
		
		<!-- ▼▼▼シェアパート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>
		<!-- ▲▲▲シェアパート▲▲▲ -->
		
		<!-- ▼▼▼誕生月選択パート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/birthday_list.php'); ?>
		<!-- ▲▲▲誕生月選択パート▲▲▲ -->
		
		<!-- ▼▼▼関連占い▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/recommend.php'); ?>
		<!-- ▲▲▲関連占い▲▲▲ -->
		
		<div class="heading deco">
			<div class="heading_catch">\ 自分を知るのが楽しくなる‼ /</div>
			<h2 class="heading_title"><span class="free_icon">無料</span>タロット占いコレクション</h2>
		</div>
		
		<!-- ▼▼▼特集メニュー（YESNOタロット）▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/yesno.php'); ?>
		<!-- ▲▲▲特集メニュー（YESNOタロット）▲▲▲ -->
		
		
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

<div class="page_top" id="js_pagetop"><div class="page_top_icon"><i class="fa-solid fa-arrow-up"></i><div class="page_top_text">TOP</div></div></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
