<div class="section rounded_box">
	<div class="section_icon">
		<div class="section_icon_item">おすすめ</div>
	</div>
	<div class="heading deco">
		
		<div class="heading_catch">\ <?php echo $the_category_contents[0]['category_group_data']['name'] ?>の悩みに寄り添い、優しく導きます /</div>
		<h2 class="heading_title"><span class="free_icon">無料</span><?php echo $the_category_contents[0]['category_data']['name'] ?>タロット占い</h2>
	</div>
	<div class="menu_list">
		<?php
		for($i=0;$i<3;$i++):
		$val = $the_category_contents[$i];
		if($val):
		?>
		<div class="menu_item">
			<a href="<?php echo $val['url'] ?>">
				<div class="menu_thm"><img src="<?php echo SERVICE_URL ?>img/category/<?php echo $val['category_data']['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $val['category_data']['name'] ?>"></div>
				<div class="menu_body">
					<ul class="menu_tag">
						<li><?php echo $val['category_group_data']['name'] ?>占い</li><li>無料占い</li>
						<?php if($val['tag_1']):  ?><li><?php echo $val['tag_1'] ?></li><?php endif; ?>
						<?php if($val['tag_2']):  ?><li><?php echo $val['tag_2'] ?></li><?php endif; ?>
					</ul>
					<h3 class="menu_title"><?php echo $a = $val['catch']?$val['catch']:$val['name']; ?></h3>
					<div class="menu_date">
						<?php echo date('Y年n月j日',strtotime($val['start_date'])); ?>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
		<?php endfor; ?>
	</div>
</div>