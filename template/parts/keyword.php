<?php 
// if($keyword_count){
// 	if($keyword_count<0){
		$keyword_count = count($keyword_data);
// 	}
// }else{
// 	$keyword_count = 10;
// }
?>
<div class="section rounded_box section_popular_tag">
	<div class="heading deco">
		<div class="heading_catch">＼今の気分を教えて‼／</div>
		<h2 class="heading_title">話題沸騰中の＂キーワード＂</h2>
	</div>
	<ul class="tag_cloud aiueo">
		<?php for($i=0;$i<$keyword_count;$i++): ?>
		<?php $val = $keyword_data[$i] ?>
		<?php if($i==5){echo '</ul><ul class="tag_cloud hide_tag">';} ?>
		<li>
			<a href="<?php echo SERVICE_URL.'menu/?keyword='.$val['name'] ?>#menu_list" class="<?php if($keyword==$val['name']){echo 'active';} ?>">
				<?php echo $val['name'] ?>
			</a>
		</li>
		<?php endfor; ?>
		<?php if($i>=5&&$i==$keyword_count){echo '</ul><!-- /.aewraewraw -->';} ?>
	</ul>
	
	<div class="keyword_more">
		<div>もっと見る▼</div>
	</div>
</div>

<!-- ▼▼▼カテゴリから探す▼▼▼ -->
<h2 class="f_color_sub">カテゴリから探す</h2>
<div class="section mt_2">
	<ul class="flex_list flex_list_3">
		<li><a href="<?php echo SERVICE_URL.'menu/?keyword=恋愛#menu_list' ?>" class="<?php if($keyword==$val['name']){echo 'active';} ?>">恋愛占い</a></li>
		<li><a href="<?php echo SERVICE_URL.'menu/?keyword=結婚#menu_list' ?>" class="<?php if($keyword==$val['name']){echo 'active';} ?>">結婚占い</a></li>
		<li><a href="<?php echo SERVICE_URL.'menu/?keyword=人生#menu_list' ?>" class="<?php if($keyword==$val['name']){echo 'active';} ?>">人生占い</a></li>
	</ul>
</div>
<!-- ▲▲▲カテゴリから探す▲▲▲ -->

