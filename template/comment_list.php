<?php $page_name = 'みんなのコメント一覧'; ?>
<?php require_once(SERVICE_PATH.'template/parts/head.php'); ?>
<body>
<div class="container">

<!-- HEADER -->
<?php require_once(SERVICE_PATH.'template/parts/site_header.php'); ?>
<!-- //HEADER -->
	
<!-- SP_NAV -->
<?php require_once(SERVICE_PATH.'template/parts/sp_nav.php'); ?>
<!-- //SP_NAV -->
	
<!-- GNAV -->
<?php require_once(SERVICE_PATH.'template/parts/gnav.php'); ?>
<!-- //GNAV -->

<!-- MAIN -->
<div class="main">
	
	<ul class="breadcrumb">
		<li><a href="<?php echo SERVICE_URL ?>">HOME</a></li>
		<li>コメント一覧</li>
	</ul>
	
	<div class="inner">



    <?php if (!empty($comment_data) && is_array($comment_data)): ?>
            <div class="comment_list">
                <?php foreach ($comment_data as $comment): ?>
                    <?php 
                    $contents = $contents_data[$comment['contents_id']] ?? [];
                    $category_group = $contents['category_group_data'] ?? [];
                    $category = $contents['category_data'] ?? [];
                    ?>
                    <div class="comment_item">

                        <div class="comment_body">
                            <h3 class="comment_title"><?php echo htmlspecialchars($comment['title'] ?? '(無題)', ENT_QUOTES, 'UTF-8'); ?></h3>
                            <div class="comment_text">
                                <?php echo nl2br(htmlspecialchars($comment['comment'] ?? '', ENT_QUOTES, 'UTF-8')); ?>
                            </div>
                            
                            <?php if (!empty($comment['name'])): ?>
                                <div class="comment_author">
                                    <?php echo htmlspecialchars($comment['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="comment_header">
                            <div class="comment_meta">
                                <div class="comment_date"><?php echo date('Y年n月j日', strtotime($comment['date'] ?? 'now')); ?></div>
                                <?php if (!empty($contents)): ?>
                                    <div class="comment_source">
                                        <a href="<?php echo htmlspecialchars($contents['url'] ?? '#', ENT_QUOTES, 'UTF-8'); ?>" class="link">
                                            <?php echo htmlspecialchars($contents['name'] ?? '不明なコンテンツ', ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="review_star">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php $star_img = ($i <= ($comment['score'] ?? 0)) ? 'star_on' : 'star_off'; ?>
                                    <img src="<?php echo htmlspecialchars(SERVICE_URL, ENT_QUOTES, 'UTF-8'); ?>img/<?php echo $star_img; ?>.png" alt="★" class="star">
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no_comment">コメントはまだありません。</p>
        <?php endif; ?>









	</div>
	<!-- //inner -->
		
	<?php require_once(SERVICE_PATH.'template/parts/sns.php'); ?>

</div>
<!-- //MAIN -->

<!--<div class="page_top" id="js_pagetop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>-->

<!-- FOOTER -->
<?php require_once(SERVICE_PATH.'template/parts/footer.php'); ?>
<!-- //FOOTER -->





</div>
</body>
</html>










