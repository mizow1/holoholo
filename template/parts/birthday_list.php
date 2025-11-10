<div class="section">
	<div class="heading deco">
		<h2 class="heading_title">誕生月から<br>タロットカードを探す</h2>
	</div>
	<ul class="flex_list flex_list_4">
		<?php for($i=1;$i<=12;$i++): ?>
		<li<?php if($month==$i){echo ' class="active"';} ?>>
			<a href="<?php echo SERVICE_URL ?>birthday/card/?month=<?php echo $i ?>">
				<?php echo $i ?>月
			</a>
		</li>
		<?php endfor; ?>
	</ul>
</div>
