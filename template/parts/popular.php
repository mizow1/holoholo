<div class="section rounded_box section_ranking">
	<div class="section_icon">
		<div class="section_icon_item">ランキング</div>
	</div>
	<div class="heading deco">
		<div class="heading_catch">\ ラウレア(幸福)を感じて‼みんなが選ぶオススメ占い /</div>
		<h2 class="heading_title">人気急上昇中‼タロット占いTOP10</h2>
	</div>
	
	<div class="swiper" id="ranking_slide">
		<div class="swiper-wrapper tile_menu">
			<?php for($i=0;$i<10;$i++):
			$val = $popular_data[$i];
			//foreach($popular_data as $val): ?>
			<div class="swiper-slide tile_menu_item">
				<a href="<?php echo $val['url'] ?>">
					<div class="tile_menu_img"><img src="<?php echo SERVICE_URL; ?>img/tile/<?php echo $val['category_data']['name_e'] ?>.jpg" alt="<?php echo $val['category_data']['name'] ?>"></div>
					<div class="tile_menu_catch dispnone">\ 近未来恋愛運 /</div>
					<h3 class="tile_menu_title">
						<?php 
						if($val['catch']){
							echo $val['catch'];
						}else{
							echo $val['name'];
						}
							?>
					</h3>
				</a>
			</div>
			<?php endfor; ?>
		</div>

		<div class="swiper-pagination"></div>
<!--
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
-->

	</div>
	
</div>
