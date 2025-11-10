<?php $page_name = '【'.$the_category_data['name'].'タロット占い】'.$the_contents_data['name'].'鑑定結果'; ?>
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
		<li>
			<a href="<?php echo SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'].'/?menu='. $the_contents_data['contents_id'].'&mode=entry';  ?>">
				<?php echo $the_contents_data['name']; ?>
			</a>
		</li>
	</ul>

	<div class="inner">
		<h2 class="fortune_menu">
			<?php echo $the_contents_data['name'] ?>
		</h2>

		<div class="spread_box result_spread spread_<?php echo $spread_id; ?>">
			<div class="spread_box_title">下にスクロールしてカードの結果を見てください</div>
			

			<!-- ▽▽▽枚数によってクラス名「result_spread_X」を変える。▽▽▽ -->
			<div class="spread_list" spread_id="<?php echo $spread_id; ?>">
				<div class="spread_img"><img src="<?php echo SERVICE_URL ?>img/spread_img.jpg" alt=""></div>
				<div class="cards_wrap">
				<?php for($i=0;$i<$spread_id;$i++): ?>
					<div class="card_wrap">
						<img src="<?php echo SERVICE_URL ?>img/today_laki_card.png" alt="" class="card_back">
						<img src="<?php echo SERVICE_URL ?>img/card/<?php echo $spread_card_id[$i] ?>.jpg" alt="" class="card_front">
					</div>
				<?php endfor; ?>
				</div>
			</div>
			<script src="<?php echo SERVICE_URL ?>js/shuffle.js"></script>

			<div class="btn_wrap">
				<div class="heading_catch mb_2">\ カードが気に入らない？ /</div>
				<a href="<?php echo SERVICE_URL.$the_category_group_data['name_e'].'/'.$the_category_data['name_e'].'/?menu='.$cid.'&mode=entry#menu_list' ?>" class="btn btn_1 btn_fix">
					シャッフルしなおす
				</a>
			</div>

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
			<?php for($i=1;$i<=5;$i++): $key='tag_'.$i;?>
			<?php if($the_contents_data[$key]): ?><li><a href="<?php echo SERVICE_URL ?>menu/?keyword=<?php echo $the_contents_data[$key] ?>"><?php echo $the_contents_data[$key] ?></a></li><?php endif; ?>
			<?php endfor; ?>
		</ul>
		
		<div class="result_date"><?php echo date('Y年n月j日',strtotime($the_contents_data['start_date'])); ?>（<?php echo date('Y年n月j日',strtotime($the_contents_data['start_date'])); ?>更新）</div>
		
		<!-- ▼▼▼目次▼▼▼ -->
		<div class="section rounded_box section_index">
			<h2 class="index_title">このタロット占いでわかること</h2>
			<div class="index_btn js_ac_trigger">鑑定一覧</div>
			<ul class="index_list">
				<?php foreach($menu_data[$cid] as $key=>$val): ?>
				<li class="index_item"><a href="#menu_<?php echo $key; ?>"><?php echo $val; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- ▲▲▲目次▲▲▲ -->

	</div>
	<!-- //result_head -->
	
	<div class="bg_sea">
		<div class="inner">

			<!-- ▼▼▼小項目▼▼▼ -->
			<?php foreach($menu_data[$cid] as $key=>$val): ?>
			<div class="section rounded_box section_result_item" id="result_1">
				<h2 class="result_title" id="menu_<?php echo $key; ?>">
					<?php echo $val; ?>
				</h2>
				<?php if($card_data[$cid][$key]): ?>
				<div class="result_card"><img src="<?php echo SERVICE_URL ?>img/card/<?php echo $card_data[$cid][$key] ?>.jpg" alt="HoloHoloタロット占い　‘I‘O（イオ）"></div>
				<div class="result_card_name"><?php echo $card_info[$card_data[$cid][$key]]['kaki'] ?><br>（<?php echo $card_info[$card_data[$cid][$key]]['yomi'] ?>）</div>
				
				<?php endif; ?>
				<div class="result_text">
					<?php echo $result_data[$cid][$key] ?>
				</div>
				<?php 
				if(!empty($recommend_contents[$key])){
					$keys = array_keys($recommend_contents[$key]);//テンプレートパターン
					$selected_key = $keys[array_rand($keys)];//選ばれたテンプレートパターン
					$the_recommend = $recommend_contents[$key][$selected_key];
					$the_template_path = SERVICE_PATH.'template/parts/link/'.$the_recommend['template'].'.php';
				}
				?>
				<?php if($the_recommend&&file_exists($the_template_path)): ?>
				<div class="recommend_contents">
					<?php require_once($the_template_path); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
			<!-- ▲▲▲小項目▲▲▲ -->
			
			
<div id="modalTwo" class="modal review_parts">
   <div class="modal-content">
     <div class="modal-head">
       <span class="js_modal-close">×</span>
      </div>
     <div class="modal-body">
       レビュー画面
     </div>
   </div>
</div>

			
			
			
			
		</div>
		<!-- //inner -->
		
	</div>
	<!-- //bg_sea -->
	
	<div class="inner">
			
		<!-- ▼▼▼シェアパート▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/share.php'); ?>
		<!-- ▲▲▲シェアパート▲▲▲ -->
		
	</div>
	<!-- //inner -->
		
	<!-- ▼▼▼ハウオリカード▼▼▼ -->
	<div class="section_hauoli">
		<div class="hauoli_head">
			<img src="<?php echo SERVICE_URL ?>img/hauoli_head.png" alt="あなたに『幸せ（＝ハウオリ）』を届ける　Hau'oli Card">
		</div>
		<div class="hauoli_body">
			<div class="hauoli_card">
				<div class="hauoli_card_img"><img src="<?php echo SERVICE_URL ?>img/hauoli_frame.png" alt="ことわざの文言が入ります。"></div>
				<div class="hauoli_card_item">
					<a href="<?php echo SERVICE_URL ?>img/hauoli/<?php echo $hauoli['id'] ?>.jpg" download>
						<img src="<?php echo SERVICE_URL ?>img/hauoli/<?php echo $hauoli['id'] ?>.jpg" alt="<?php echo $hauoli['name_e'] ?>">
					</a>
				</div>
			</div>
			<div class="hauoli_word">
				-<?php echo $hauoli['name'] ?>-<br>
				<strong class="hauoli_word_en"><?php echo $hauoli['name_e'] ?></strong>
			</div>
			<h4 class="hauoli_text">
				<?php echo $hauoli['short'] ?>
			</h4>
			<div class="hauoli_exp">
				<?php echo $hauoli['long'] ?>
			</div>

			<div class="btn_wrap dispnone" href="<?php echo SERVICE_URL ?>img/hauoli/<?php echo $hauoli['id'] ?>.jpg" download>
				<button class="btn btn_3 btn_fix js_modal-toggle">待ち受けサイズ一覧はこちら</button>
			</div>

			
			<a class="btn_wrap" href="<?php echo SERVICE_URL ?>img/hauoli/<?php echo $hauoli['id'] ?>.jpg" download>
				<button class="btn btn_3 btn_fix" data-modal="hauoli_size">カードダウンロード</button>
			</a>

		</div>
		
		<!-- ▽▽▽ハウオリカード_サイズ選択用Modal▽▽▽ -->
		<div id="hauoli_size" class="modal">
			<div class="modal-content">
				<div class="modal-head">
					<span class="js_modal-close">×&nbsp;結果ページに戻る</span>
				</div>
				<div class="modal-body">
					<!--<div class="hauoli_body">-->

						<div class="hauoli_card">
							<div class="hauoli_card_item"><img src="<?php echo SERVICE_URL ?>img/hauoli/<?php echo $hauoli['id'] ?>.jpg" alt="ことわざの文言が入ります。"></div>
						</div>

						<p>iphone</p>
						<div class="btn_wrap">
							<a href="#" target="_blank" class="btn btn_3 btn_fix">740×1196</a>
						</div>

						<p>Android</p>
						<div class="btn_wrap">
							<a href="#" target="_blank" class="btn btn_3 btn_fix mb_2">1440×2560</a>
							<a href="#" target="_blank" class="btn btn_3 btn_fix mb_2">2160×1920</a>
							<a href="#" target="_blank" class="btn btn_3 btn_fix">1440×1280</a>
						</div>

					<!--</div>-->
				</div>
			</div>
		</div>
		<!-- △△△ハウオリカード_サイズ選択用Modal△△△ -->
		
	</div>
	<!-- ▲▲▲ハウオリカード▲▲▲ -->
	
	
	<div class="inner">
	
		<!-- ▼▼▼レビューパート▼▼▼ -->
		<div class="section section_review">
			<?php if($comment_data): ?>
			<div class="review_head js_ac_trigger">
				<h4 class="review_title">占いレビュー</h4>
				<div class="review_average">満足度<?php echo $comment_average ?></div>
				<ul class="review_star">
					<?php for($i=1;$i<=5;$i++): ?>
					<?php if($i<=$comment_average): ?>
					<li>★</li>
					<?php else: ?>
					<li class="off">★</li>
					<?php endif; ?>
					<?php endfor; ?>
				</ul>
				<div class="review_total">(<?php echo count($comment_data) ?>件)</div>
			</div>

			<div class="review_list hidden">
				<?php foreach($comment_data as $val): ?>
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
						<div class="review_date"><?php echo date('Y年n月j日',strtotime($val['date'])); ?></div>
					</div>
					
					<?php if($val['title']): ?>
					<div class="review_subject"><strong><?php echo $val['title'] ?></strong></div>
					<?php endif; ?>

					<div class="review_text"><?php echo $val['comment'] ?></div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<div class="heading_title_sub mt_6" id="my_comment">占いレビューをコメントする</div>
			<?php if($comment_send == 1): ?>
				<div class="comment_send">レビューいただきありがとうございます。承認後に表示されます。</div>
			<?php endif; ?>
			<form action="<?php echo SERVICE_URL ?>parts/send_comment.php" method="post">
				<div class="review_rate_form">
					<input id="star_5" type="radio" name="rate" value="5">
					<label for="star_5">★</label>
					<input id="star_4" type="radio" name="rate" value="4">
					<label for="star_4">★</label>
					<input id="star_3" type="radio" name="rate" value="3">
					<label for="star_3">★</label>
					<input id="star_2" type="radio" name="rate" value="2">
					<label for="star_2">★</label>
					<input id="star_1" type="radio" name="rate" value="1">
					<label for="star_1">★</label>
				</div>
				<div class="review_form">
					<input type="text" class="form_text" placeholder="タイトル（※任意）" name="title">
					<textarea class="form_textarea" placeholder="レビュー" name="body"></textarea>
				</div>
				<input type="hidden" name="cid" value="<?php echo $the_contents_data['contents_id'] ?>">
				<input type="hidden" name="return_url" value="<?php echo $now_url ?>">

				<div class="btn_wrap">
					<button type="submit" class="btn btn_3 btn_fix">レビューを投稿する</button>
				</div>
			</form>
		</div>
		<!-- ▲▲▲レビューパート▲▲▲ -->
		
		<div class="btn_wrap dispnone">
			<a href="<?php echo SERVICE_URL ?>" class="btn btn_2 btn_fix">〇〇占いをもっと占う‼</a>
		</div>

		<!-- ▼▼▼関連占い▼▼▼ -->
		<div class="section rounded_box">
			<!--<div class="section_icon">おすすめ</div>-->
			<div class="heading deco">
				<h2 class="heading_title">この鑑定をした人は<br>こんなことも占っています</h2>
			</div>
			<div class="menu_list">
				<?php for($i=0;$i<3;$i++): $val = $category_menu[$i]?>
				<?php if($val): ?>
				<div class="menu_item">
					<a href="<?php echo $val['url'] ?>">
						<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/<?php echo $val['category_data']['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $val['category_data']['name'] ?>"></div>
						<div class="menu_body">
							<ul class="menu_tag">
								<li><?php echo $val['category_group_data']['name'] ?></li>
								<li><?php echo $val['category_data']['name'] ?></li>
								<?php if($val['tag_1']): ?><li><?php echo $val['tag_1'] ?></li><?php endif; ?>
								<?php if($val['tag_2']): ?><li><?php echo $val['tag_2'] ?></li><?php endif; ?>
								<?php if($val['tag_3']): ?><li><?php echo $val['tag_3'] ?></li><?php endif; ?>
								<?php if($val['tag_4']): ?><li><?php echo $val['tag_4'] ?></li><?php endif; ?>
								<?php if($val['tag_5']): ?><li><?php echo $val['tag_5'] ?></li><?php endif; ?>
							</ul>
							<h3 class="menu_title"><?php echo $a = $val['catch']?$val['catch']:$val['name'] ?></h3>
							<div class="menu_date"><?php echo date('Y年n月j日',strtotime($val['start_date'])); ?></div>
						</div>
					</a>
				</div>
				<?php endif; ?>
				<?php endfor; ?>
			</div>
		</div>
		<!-- ▲▲▲関連占い▲▲▲ -->
		
		<!-- ▼▼▼おすすめ▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/recommend.php'); ?>
		<!-- ▲▲▲おすすめ▲▲▲ -->

		<!-- ▼▼▼ランキング▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/popular.php'); ?>
		<!-- ▲▲▲ランキング▲▲▲ -->
		
		
		<!-- ▼▼▼話題のキーワード▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/keyword.php'); ?>
		<!-- ▲▲▲話題のキーワード▲▲▲ -->
		
		<!-- ▼▼▼新着タロット占い▼▼▼ -->
		<?php require_once(SERVICE_PATH.'template/parts/new.php'); ?>
		<!-- ▲▲▲新着タロット占い▲▲▲ -->
		
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
		
		<!-- ▼▼▼口コミ▼▼▼ -->
		<?php 
		$comment_data = $comment_data_all;
		require_once(SERVICE_PATH.'template/parts/comment.php');
		?>
		<!-- ▲▲▲口コミ▲▲▲ -->
	</div>
	<!-- //inner -->
		
		
	<?php require_once(SERVICE_PATH.'template/parts/closing.php'); ?>




</div>
<!-- //MAIN -->


<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
<script src="<?php echo SERVICE_URL ?>js/result.js"></script>
</body>
</html>
