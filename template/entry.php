<?php $page_name = '【'.$the_category_data['name'].'タロット占い】'.$the_contents_data['name']; ?>
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
		<li><a href="<?php echo SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'].'/' ?>"><?php echo $the_category_data['name'] ?>タロット占い</a></li>
		<li><?php echo $the_contents_data['name']; ?></li>
	</ul>
	
	<div class="inner">

		<div class="entry_box">
			<div class="entry_box_head">
				<div class="entry_box_img"><img src="<?php echo SERVICE_URL ?>img/entry_head/<?php echo $the_category_group_data['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $the_category_group_data['name'] ?>"></div>
				<h3 class="entry_box_name"><div class="entry_box_name_sub"><?php echo $category_caption[$the_category_data['name_e']] ?></div><?php echo $the_category_data['name'] ?>タロット占い</h3>
			</div>
			
			<div class="entry_box_body">
				<h2 class="entry_box_title"><?php echo $the_contents_data['name']; ?></h2>
				<div class="align_center">
					<a href="#menu_list" class="btn btn_1 btn_fix">今すぐ占う&nbsp;<i class="fa-solid fa-caret-down"></i></a>
				</div>
			</div>
		</div>
		
		<?php if(count($the_comment_data)): ?>
		<h4 class="heading_title_sub">「このタロット占いを鑑定した人」<?php echo count($the_comment_data) ?>件</h4>
		<?php endif; ?>
		
		
		<div class="entry_caption">
		<?php echo $the_contents_data['caption']; ?>
		</div>
		
		<ul class="cat_list">
			<li><a href="<?php echo SERVICE_URL ?>menu/?keyword=タロット占い">タロット占い</a></li>
			<li><a href="<?php echo SERVICE_URL ?>menu/?keyword=無料占い">無料占い</a></li>
			<li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['category_group_data']['name'] ?>"><?php echo $the_contents_data['category_group_data']['name'] ?></a></li>
			<?php if($the_contents_data['category_group_data']['name'] !== $the_contents_data['category_data']['name']): ?>
				<li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['category_data']['name'] ?>"><?php echo $the_contents_data['category_data']['name'] ?></a></li>
			<?php endif; ?>
		</ul>
		

		<ul class="tag_list">
			<?php if($the_contents_data['tag_1']): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['tag_1'] ?>"><?php echo $the_contents_data['tag_1'] ?></a></li><?php endif; ?>
			<?php if($the_contents_data['tag_2']): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['tag_2'] ?>"><?php echo $the_contents_data['tag_2'] ?></a></li><?php endif; ?>
			<?php if($the_contents_data['tag_3']): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['tag_3'] ?>"><?php echo $the_contents_data['tag_3'] ?></a></li><?php endif; ?>
			<?php if($the_contents_data['tag_4']): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['tag_4'] ?>"><?php echo $the_contents_data['tag_4'] ?></a></li><?php endif; ?>
			<?php if($the_contents_data['tag_5']): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data['tag_5'] ?>"><?php echo $the_contents_data['tag_5'] ?></a></li><?php endif; ?>
		</ul>
		
		<div class="result_date"><?php echo date('Y年n月j日',strtotime($the_contents_data['start_date'])); ?>（<?php echo date('Y年n月j日',strtotime($the_contents_data['start_date'])); ?>更新）</div>
		
		<!-- ▼▼▼レビューパート▼▼▼ -->
		<?php if($the_comment_data): ?>
		<div class="section section_review">
			<h4 class="heading_title_sub">占いレビュー</h4>
			<div class="review_list">
				<?php foreach($the_comment_data as $val): ?>
				<div class="review_item">
					
					<div class="review_info">
						評価
						<ul class="review_star">
							<?php for($i=0;$i<5;$i++): ?>
							<?php if($i<$val['score']): ?>
							<li>★</li>
							<?php else: ?>
							<li class="off">★</li>
							<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<div class="review_date"><?php echo date('Y年n月j日',strtotime($val['date'])) ?></div>
					</div>
					<div class="review_subject"><strong><?php echo $val['title'] ?></strong></div>
					<div class="review_text"><?php echo $val['comment'] ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- ▲▲▲レビューパート▲▲▲ -->
		
		<!-- ▼▼▼目次▼▼▼ -->
		<div class="section rounded_box section_index">
			<h2 class="index_title">このタロット占いでわかること</h2>
			<div class="index_btn">鑑定一覧</div>
			<ul class="index_list">
				<?php foreach($the_menu_data as $val): ?>
				<li class="index_item"><?php echo $val['name'] ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- ▲▲▲目次▲▲▲ -->
		
		<div class="spread_box spread_box_entry" id="menu_list">
			<div class="spread_box_title"><span>心を込めてカードを混ぜてください</span></div>
			
			<!-- ▽▽▽枚数によってクラス名「result_spread_X」を変える？▽▽▽ -->
			<div class="spread_list" card_count=<?php echo $card_count ?>>
				<div class="spread_img"><img src="<?php echo SERVICE_URL ?>img/shuffle_img_1.jpg" alt=""></div>
				<?php for($i=1;$i<=30;$i++): ?>
				<img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="<?php echo $i ?>" class="card_back">
				<?php endfor; ?>
			</div>
			<div class="card_select"><span class="f_color_pink">カードを</span>1束選んで<br><span class="f_color_pink">クリック</span>してください</div>
			<div class="btn_wrap">
				<button type="button" class="btn btn_1 btn_fix mb_4 shuffle_start">シャッフルする</button>
				<button type="button" class="btn btn_2 btn_fix shuffle_end">カードを配る</button>
				<a href="<?php echo SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'] ?>/?menu=<?php echo $the_contents_data['contents_id'] ?>&mode=result" class="btn btn_3 btn_fix go_result">鑑定結果を見る</a>
			</div>
		</div>
		<!-- /.spread_box -->
		<script src="<?php echo SERVICE_URL ?>js/shuffle.js"></script>
	</div>
	<!-- //inner -->
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>

</div>
<!-- //MAIN -->

<!--<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>-->

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>
