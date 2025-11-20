<div class="section section_category">
	<div class="heading deco card">
		<div class="heading_catch">＼占いたいことは決まった？／</div>
		<h2 class="heading_title">タロット占いメニュー</h2>
		<div class="heading_img"><img src="<?php echo SERVICE_URL; ?>img/icon_free.png" alt="無料占い"></div>
	</div>

	<?php foreach($category_group_data as $val): ?>
	<?php if($category_menu[$val['name_e']]): ?>
	<div class="category_box">
		<div class="category_head">
			<div class="category_img"><img src="<?php echo SERVICE_URL; ?>img/category_img_<?php echo $val['name_e'] ?>.jpg" alt="\ 今の恋を絶対に叶えたい人向け /今の恋を100倍幸せにする「恋愛占い」" loading="lazy"></div>
			<div class="category_more">
				<a href="<?php echo $val['url'] ?>"><?php echo $val['name'] ?>タロット占い一覧へ</a>
			</div>
		</div>
		<div class="category_body">
			<div class="category_catch">\ こんな<?php echo $val['name'] ?>の悩みの人がよく占っています /</div>
			<div class="category_caption">
				<?php echo $nayami[$val['name_e']]; ?>
			</div>
			<div class="category_catch">\ 人気<?php echo $val['name'] ?>占いPICK UP!! /</div>
			<div class="tile_menu">
				<?php
				for($i=0;$i<3;$i++):
				$the_contents = $category_menu[$val['name_e']][$i];
				$start_date = new DateTime($the_contents['start_date']);
				$now = new DateTime();
				if($the_contents&&$start_date<=$now):
				?>
				<div class="tile_menu_item">
					<a href="<?php echo $the_contents['url'] ?>">
						<div class="tile_menu_img"><img src="<?php echo SERVICE_URL; ?>img/tile/<?php echo $the_contents['category_data']['name_e'] ?>.jpg" alt="恋の相性" loading="lazy"></div>
						<div class="tile_menu_catch dispnone">\ すべての相性がわかる /</div>
						<h3 class="tile_menu_title"><?php echo $a = $the_contents['catch']?$the_contents['catch']:$the_contents['name'] ?></h3>
					</a>
				</div>
				<?php endif; ?>
				<?php endfor; ?>
			</div>
			<div class="btn_wrap">
				<a href="<?php echo $val['url'] ?>" class="btn btn_3 btn_fix"><?php echo $val['name'] ?>タロット占い一覧へ</a>
			</div>
			<!-- //tile_menu -->
		</div>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
	
	<div class="btn_wrap">
		<a href="<?php echo SERVICE_URL; ?>menu/" class="btn btn_1 btn_fix">占いメニュー一覧へ</a>
	</div>

</div>