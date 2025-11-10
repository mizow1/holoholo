<div class="section rounded_box">
	<div class="section_icon">
		<div class="section_icon_item">新着占い</div>
	</div>
	<div class="heading deco card">
		<div class="heading_catch">\ 毎日朝00時に更新中‼ /</div>
		<h2 class="heading_title"><span class="free_icon">無料</span>新着タロット占い</h2>
	</div>
	<div class="menu_list">
		<?php 
		for($i=0;$i<2;$i++):
		$the_contents = $contents_data_new[$i];
		$the_category = $the_contents['category_data'];
		$the_category_group = $the_contents['category_group_data'];
		?>
		<div class="menu_item">
			<a href="<?php echo $the_contents['url']; ?>">
				<div class="menu_thm"><img src="<?php echo SERVICE_URL; ?>img/category/koinoyukue.jpg" alt="HoloHoloタロット占い　恋の行方"></div>
				<div class="menu_body">
					<ul class="menu_tag">
						<li>恋愛占い</li>
						<?php if($the_contents['tag_1']): ?><li><?php echo $the_contents['tag_1']; ?></li><?php endif; ?>
						<?php if($the_contents['tag_2']): ?><li><?php echo $the_contents['tag_2']; ?></li><?php endif; ?>
					</ul>
					<h3 class="menu_title">
						<?php
						if($contents_data_new[$i]['catch']){
							echo $the_contents['catch'];
						}else{
							echo $the_contents['name'];
						}
						?>
					</h3>
					<div class="menu_date">
						<?php echo date('Y年n月j日',strtotime($the_contents['start_date'])) ?>
					</div>
				</div>
			</a>
		</div>
		<?php endfor; ?>
	</div>
</div>
