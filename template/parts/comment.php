<div class="section rounded_box deco">
	<div class="section_icon">
		<div class="section_icon_item">口コミ</div>
	</div>
	<div class="heading deco">
		<div class="heading_catch">\ タロット占いの結果はどうだった？ /</div>
		<h2 class="heading_title">リアルタイム‼みんなのレビュー</h2>
	</div>
	<div class="swiper" id="review_slide">
		<div class="swiper-wrapper">
			<?php
			// 現在日時を取得
			$current_date = time();
			$max_display = 15; // 最大表示件数

			// 表示可能なコメントをフィルタリング
			$filtered_comments = [];
			foreach ($comment_data as $comment) {
			    if ($comment && 
			        strtotime($comment['date']) <= $current_date && 
			        $comment['approval'] == 1) {
			        $filtered_comments[] = $comment;
			        if (count($filtered_comments) >= $max_display) {
			            break; // 最大表示件数に達したら終了
			        }
			    }
			}

			// フィルタリングしたコメントを表示
			foreach ($filtered_comments as $the_comment):
			    $the_contents = $contents_data[$the_comment['contents_id']];
			    $the_category = $the_contents['category_data'];
			    $the_category_group = $the_contents['category_group_data'];
			?>
			<div class="swiper-slide review_card">
				<div class="review_card_head">
					<a href="<?php echo $the_contents['url'] ?>">
						<div class="review_card_img"><img src="<?php echo SERVICE_URL; ?>img/review/<?php echo $the_category['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $the_category['name'] ?>"></div>
						<h3 class="review_card_menu">
							<?php
							if($the_contents['catch']){
								echo $the_contents['catch'];
							}else{
								echo $the_contents['name'];
							}
							?>
						</h3>
					</a>
				</div>
				<div class="review_card_body">
					<div class="review_info">
						評価
						<ul class="review_star">
							<?php for($j=0;$j<5;$j++): ?>
							<?php if($j<$the_comment['score']): ?>
							<li>★</li>
							<?php else: ?>
							<li class="off">★</li>
							<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<div class="review_date"><?php echo date('Y年n月j日',strtotime($the_comment['date'])) ?></div>
					</div>
					<div class="review_subject"><strong><?php echo $the_comment['title'] ?></strong></div>
					<div class="review_text">
						<?php
						if (mb_strlen($the_comment['comment'], 'UTF-8') < 100) {
							$a = $the_comment['comment'];
						} else {
							$a = mb_substr($the_comment['comment'], 0, 100, 'UTF-8') . '…';
						}
						echo $a;
						?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
		<div class="swiper-pagination"></div>
<!--
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
-->

<a href="<?php echo SERVICE_URL ?>comment/">> 全てのコメントを見る</a>
	</div>
	
</div>