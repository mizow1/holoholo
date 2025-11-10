<div class="tab_panel_wrap">
	<?php if($category_menu): ?>
		<?php
		for($i=0;$i<10;$i++):
		$val = $category_menu[$i];
		if(count($val['comment_data'])):
		?>
		<div class="review_group">
			<div class="review_menu">
				<div class="menu_list">
					<div class="menu_item">
						<a href="<?php echo $val['url'] ?>">
							<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/aitenokimochi.jpg" alt="HoloHoloタロット占い　相手の気持ち"></div>
							<div class="menu_body">
								<ul class="menu_tag"><li><?php echo $val['category_group_data']['name'] ?></li><li>無料占い</li><li><?php echo $val['category_data']['name'] ?></li></ul>
								<h3 class="menu_title">
									<?php echo $a = $val['catch']?$val['catch']:$val['name'] ?>
								</h3>
								<div class="menu_date"><?php echo date('Y年n月j日',strtotime($val['start_date'])) ?></div>
							</div>
						</a>
					</div>
				</div>
				<div class="review_more"><a href="<?php echo $val['url'] ?>" class="btn btn_3">占う</a></div>
			</div>

			<div class="review_head">
				<h4 class="review_title">レビュー数（<?php echo count($val['comment_data']) ?>件）</h4>
				<div class="review_average">満足度<?php echo $val['average'] ?></div>
				<ul class="review_star">
					<?php for($l=1;$l<=5;$l++): ?>
					<li<?php if($l>$val['average']){echo ' class="off"';} ?>>★</li>
					<?php endfor; ?>
				</ul>
			</div>

			<div class="review_list">
				<?php
				for($j=0;$j<3;$j++):
				$comment_data = $val['comment_data'][$j];
				if($comment_data):
				?>
				<div class="review_item">
					<div class="review_info">
						評価
						<ul class="review_star">
							<?php for($k=0;$k<5;$k++): ?>
							<?php if($k<$comment_data['score']): ?>
							<li>★</li>
							<?php else: ?>
							<li class="off">★</li>
							<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<div class="review_date"><?php echo date('Y年n月j日',strtotime($comment_data['date'])) ?></div>
					</div>
					<div class="review_subject"><strong><?php echo $comment_data['title'] ?></strong></div>
					<div class="review_text"><?php echo $comment_data['comment'] ?></div>
				</div>
				<?php endif; ?>
				<?php endfor; ?>
			</div><!-- //review_list -->
		</div><!-- //review_group -->
		<?php endif; ?>
		<?php endfor; ?>
		<?php endif; ?>

</div>
<!-- /.tab_panel_wrap -->