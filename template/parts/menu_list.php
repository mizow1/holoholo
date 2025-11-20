<div class="section<?php if($_GET['order']=='comment'): ?> section_review_tab<?php endif; ?>" id="menu_list">
	<div class="tab_menu js-tab">
		<ul class="tab">
			<li class="tab_btn<?php if($_GET['order']=='new'||!isset($_GET['order'])): ?> active<?php endif; ?>"><a href="<?php echo $now_url.'order=new#menu_list'; ?>">新着占い順</a></li>
			<li class="tab_btn<?php if($_GET['order']=='popular'): ?> active<?php endif; ?>"><a href="<?php echo $now_url.'order=popular#menu_list'; ?>">人気占い順</a></li>
			<li class="tab_btn<?php if($_GET['order']=='comment'): ?> active<?php endif; ?>"><a href="<?php echo $now_url.'order=comment#menu_list'; ?>">レビュー数順</a></li>
		</ul>

		<?php if($_GET['order']=='comment'): ?>

			<?php require_once(SERVICE_PATH.'template/parts/menu_list_comment.php'); ?>
		<?php else: ?>
		<div class="tab_panel_wrap">
			<div class="tab_panel tab_panel_show">
				<div class="menu_list">
					<?php if($category_menu): ?>
					<?php foreach($category_menu as $val): ?>
					<div class="menu_item">
						<a href="<?php echo $val['url'] ?>">
							<div class="menu_thm"><img src="<?php echo SERVICE_URL; ?>img/category/<?php echo $val['category_data']['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $val['category_data']['name'] ?>"></div>
							
							<div class="menu_body">
							<?php if($val['pv']): ?><div class="pv"><span><?php echo $val['pv'] ?>view</span></div><?php endif; ?>
								<ul class="menu_tag">
									<li><?php echo $val['category_group_data']['name'] ?></li>
									<li><?php echo $val['category_data']['name'] ?></li>
									<?php if($val['tag_1']): ?><li><?php echo $val['tag_1'] ?></li><?php endif; ?>
									<?php if($val['tag_2']): ?><li><?php echo $val['tag_2'] ?></li><?php endif; ?>
									<?php if($val['tag_3']): ?><li><?php echo $val['tag_3'] ?></li><?php endif; ?>
									<?php if($val['tag_4']): ?><li><?php echo $val['tag_4'] ?></li><?php endif; ?>
									<?php if($val['tag_5']): ?><li><?php echo $val['tag_5'] ?></li><?php endif; ?>
								</ul>
								<?php $name = $val['catch']?$val['catch']:$val['name']; ?>
								<h3 class="menu_title"><?php echo $name; ?></h3>
								<div class="menu_date"><?php echo date('Y年n月j日',strtotime($val['start_date'])); ?></div>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
					<?php else: ?>
						このテーマのメニューはまだありません。
						<a href="<?php echo SERVICE_URL.'renai/' ?>">
							恋愛占い
						</a>
						<a href="<?php echo SERVICE_URL.'kekkon/' ?>">
							結婚占い
						</a>
						<a href="<?php echo SERVICE_URL.'jinsei/' ?>">
							人生占い
						</a>
					<?php endif; ?>
				</div>
				<!-- //menu_list -->

				<?php if($total_pages > 1): ?>
				<div class="pagination">
					<?php
					$order = isset($_GET['order']) ? $_GET['order'] : 'new';
					$base_url = $now_url . 'order=' . $order;
					?>

					<?php if($current_page > 1): ?>
					<a href="<?php echo $base_url . '&page=' . ($current_page - 1) . '#menu_list'; ?>" class="pagination_prev">前へ</a>
					<?php endif; ?>

					<div class="pagination_numbers">
						<?php
						$start_page = max(1, $current_page - 2);
						$end_page = min($total_pages, $current_page + 2);

						if($start_page > 1): ?>
						<a href="<?php echo $base_url . '&page=1#menu_list'; ?>">1</a>
						<?php if($start_page > 2): ?><span class="pagination_dots">...</span><?php endif; ?>
						<?php endif; ?>

						<?php for($i = $start_page; $i <= $end_page; $i++): ?>
						<?php if($i == $current_page): ?>
						<span class="pagination_current"><?php echo $i; ?></span>
						<?php else: ?>
						<a href="<?php echo $base_url . '&page=' . $i . '#menu_list'; ?>"><?php echo $i; ?></a>
						<?php endif; ?>
						<?php endfor; ?>

						<?php if($end_page < $total_pages): ?>
						<?php if($end_page < $total_pages - 1): ?><span class="pagination_dots">...</span><?php endif; ?>
						<a href="<?php echo $base_url . '&page=' . $total_pages . '#menu_list'; ?>"><?php echo $total_pages; ?></a>
						<?php endif; ?>
					</div>

					<?php if($current_page < $total_pages): ?>
					<a href="<?php echo $base_url . '&page=' . ($current_page + 1) . '#menu_list'; ?>" class="pagination_next">次へ</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>

			</div>
			<!-- //tab_panel -->
		</div>
		<?php endif; ?>
	</div>
	<!-- //tab_menu -->
	
</div>
