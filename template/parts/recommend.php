<div class="section rounded_box">
	<div class="section_icon">
		<div class="section_icon_item">おすすめ</div>
	</div>
	<div class="heading deco">
		<div class="heading_catch">＼マナの力で幸運を引き寄せる！／</div>
		<h2 class="heading_title"><span class="free_icon">無料</span>悩み解決‼厳選タロット占い</h2>
	</div>
	<div class="menu_list">
		<?php foreach($recommend_data as $val): ?>
		<div class="menu_item">
			<a href="<?php echo $val['url'] ?>">
				<div class="menu_thm"><img src="<?php echo SERVICE_URL; ?>img/category/<?php echo $val['category_data']['name_e'] ?>.jpg" alt="HoloHoloタロット占い　<?php echo $val['category_data']['name'] ?>"></div>
				<div class="menu_body">
					<ul class="menu_tag">
					<li><?php echo $val['category_group_data']['name'] ?>占い</li>
					<?php for($i=1;$i<=5;$i++): ?>
							<?php if($val['tag_'.$i]): ?><li><?php echo $val['tag_'.$i]; ?></li><?php endif; ?>
						<?php endfor; ?>
					</ul>
					<h3 class="menu_title">
						<?php 
						if($val['catch']){
							echo $val['catch'];
						}else{
							echo $val['name'];
						}
							?>
					</h3>
					<div class="menu_date">
						<?php date('Y年n月j日',strtotime($val['start_date'])) ?>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>