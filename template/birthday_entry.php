<?php $page_name = '365日タロット占い'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">
<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	

<!-- MAIN -->
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
		<li><?php echo $page_name ?></li>
	</ul>
	
	<div class="inner">
		<div class="section_365">
			<form action="<?php echo SERVICE_URL ?>birthday/result/">
			<div class="box_card">
				<div class="box_card_head">
					<div class="box_card_img"><img src="<?php echo SERVICE_URL ?>img/365_img.jpg" alt="HoloHoloタロット占い　誕生日占い"></div>
					<h3 class="box_card_title"><div class="box_card_title_sub">誕生日からあなたの運命を読み解く</div>365日タロット占い</h3>
				</div>
				<div class="box_card_body">
					<div class="heading deco">
						<h2 class="heading_title">誕生日を入力してください</h2>
					</div>
					
					<div class="tarot365_entry form_inline">

						<div class="form_inline_item subject">
							<div class="form_select_wrap">
								<select id="btd_m" name="month" class="form_select">
									<?php for($i=1;$i<=12;$i++): ?>
									<option value="<?php echo $i ?>"<?php if($i=='6'){echo ' selected';} ?>><?php echo $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<p class="form_inline_item label">月</p>

						<div class="form_inline_item subject">
							<div class="form_select_wrap">
								<select id="btd_d" name="day" class="form_select">
									<?php for($i=1;$i<=31;$i++): ?>
									<option value="<?php echo $i ?>"<?php if($i=='15'){echo ' selected';} ?>><?php echo $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<p class="form_inline_item label">日</p>
					</div>
					
					<div class="spread_365">
						<div class="spread_365_img"><img src="<?php echo SERVICE_URL ?>img/spread_img.jpg" alt="今日のラキ(運)タロット占い"></div>
						<div class="spread_365_item"><img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="HoloHoloタロット占い"></div>
					</div>
					
					<p class="align_center">誕生日を入力したら<br>カードをめくってください</p>
					
					<div class="btn_wrap">
						<button type="submit" class="btn btn_2 btn_fix">カードをめくる</button>
					</div>
					
				</div>
			</div>
			</form>
		</div>
		<!-- //section_365 -->
		
		<!-- ▼▼▼誕生月選択パート▼▼▼ -->
		<div class="section">
			<div class="heading deco">
				<h2 class="heading_title">誕生月から<br>タロットカードを探す</h2>
			</div>
			<ul class="flex_list flex_list_4">
				<?php for($i=1;$i<=12;$i++): ?>
				<li><a href="<?php echo SERVICE_URL ?>birthday/card/?month=<?php echo $i ?>"><?php echo $i ?>月</a></li>
				<?php endfor; ?>
			</ul>
		</div>
		<!-- ▲▲▲誕生月選択パート▲▲▲ -->
		
		<!-- ▼▼▼同じ誕生日の有名人パート▼▼▼ -->
		<div class="section rounded_box section_result_item">
			<div class="section_icon">
				<div class="section_icon_item">ピックアップ</div>
			</div>
			<div class="heading deco">
				<h2 class="heading_title">あの有名人の<br>HoloHoloタロットカードは？</h2>
			</div>
			<div class="align_center f_color_base"></div>
			<div class="heading">
				<?php echo "<!--";var_dump('20ee',$the_birthday_data);echo "-->"; ?>
				<div class="heading_catch"><?php echo date('n') ?>月<?php echo date('j') ?>日生まれの<br>《 <?php echo $the_birthday_data['pickup_celebrity_job'] ?> 》</div>
				<h3 class="heading_title"><?php echo $the_birthday_data['pickup_celebrity'] ?></h3>
			</div>
			<div class="result_thm"><img src="<?php echo SERVICE_URL ?>img/card/<?php echo $the_birthday_data['card_id'] ?>.jpg" alt="HoloHoloタロット占い　‘I‘O（イオ）"></div>
			<div class="result_thm_caption"><?php echo $the_birthday_data['card_data']['kaki'] ?>（<?php echo $the_birthday_data['card_data']['yomi'] ?>）</div>
			<div class="btn_wrap">
				<a href="<?php echo SERVICE_URL ?>birthday/result/?month=<?php echo date('n') ?>&day=<?php echo date('j') ?>" class="btn btn_2 btn_fix">このタロットカードの<br>結果を見る</a>
				
			</div>
			
			<!-- ▽▽▽アンカーテキストリンク▽▽▽ -->
			<div class="pr_text">
				<a href="https://xn--100-gl4bpc8b3oocv753by8dr6skr7a.com/celebrity/" target="_blank" class="underline">【おすすめPR】無料100％姓名判断で、あの有名人の姓名判断を占ってみた！</a>
			</div>
			<!-- △△△アンカーテキストリンク△△△ -->
			
		</div>
		<!-- ▲▲▲同じ誕生日の有名人パート▲▲▲ -->
		
		
	</div>
	<!-- //inner -->
		
		
		
		
		
		
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>


</div>
<!-- //MAIN -->

<div class="page_top" id="js_pagetop"><div class="page_top_icon"><i class="fa-solid fa-arrow-up"></i><div class="page_top_text">TOP</div></div></div>

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
<script src="<?php echo SERVICE_URL ?>js/birthday.js"></script>
</body>
</html>
