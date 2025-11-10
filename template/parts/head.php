<?php
$page_title=$page_name?$page_name.'｜':'';
$currentUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($currentUrl, 'top') !== false) {
	$service_name = SERVICE_NAME;
} else {
	$service_name = SERVICE_NAME_LOWER;
}
$page_title = $page_title.$service_name;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<meta name="robots" content="ALL">
<meta name="Description" content="<?php echo $meta_info['description'] ?>" />
<meta name="Keywords" content="<?php echo $meta_info['keyword'] ?>" />
<meta name="viewport" content="width=device-width">
<title><?php echo $page_title ?></title>

<link rel="icon" href="<?php echo SERVICE_URL; ?>img/favicon/favicon.ico" sizes="any"><!-- 32×32 -->
<link rel="icon" href="<?php echo SERVICE_URL; ?>img/favicon/icon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?php echo SERVICE_URL; ?>img/favicon/apple-touch-icon.png"><!-- 180×180 -->
<link rel="manifest" href="<?php echo SERVICE_URL; ?>img/favicon/manifest.webmanifest">

<link rel="canonical" href="<?php $a = $canonical?$canonical:now_url(); echo $a; ?>">

<!-- ▼googleFont Noto Serif JP▼ -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@300;400;500;700&display=swap" rel="stylesheet">

<!-- ▼Font Awesome 6▼ -->
<link rel="stylesheet" type="text/css" href="<?php echo SERVICE_URL; ?>css/holoholo_font.css?ver6.4.2" />

<link rel="stylesheet" href="<?php echo SERVICE_URL; ?>css/common.css" type="text/css" />
<link rel="stylesheet" href="<?php echo SERVICE_URL; ?>css/style.css" type="text/css" />
	
<!-- ▼OGP▼ -->
<!--<meta property="fb:app_id" content="165963080986864" />-->
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="<?php echo $page_title ?>" />
<meta property="og:url" content="<?php echo SERVICE_URL; ?>" />
<meta property="og:image" content="<?php echo SERVICE_URL; ?>img/ogp_img.jpg" />
<meta property="og:site_name" content="<?php echo SERVICE_NAME ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="<?php echo $meta_info['description'] ?>" />
<!--
<meta property="article:author" content="https://www.facebook.com/profile.php?id=100026722663965" />
<meta property="article:publisher" content="https://www.facebook.com/profile.php?id=100026722663965" />
-->
<!-- twitter:card-->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@sachikoi_uranai" />
<meta name="twitter:title" content="完全無料-ホロホロタロット占い-" />
<meta name="twitter:description" content="ハワイの神聖な力(マナ)がたくさん込められた≪ホロホロタロット≫44枚のカードが、あなたらしい生き方と本当の幸せを優しくお届けします。すべて完全無料でお楽しみいただけます。" />
<meta name="twitter:image" content="<?php echo SERVICE_URL; ?>img/ogp_img.jpg" />
<meta name="twitter:url" content="<?php echo SERVICE_URL; ?>" />

<!-- ▼▼▼全ページ共通▼▼▼ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo SERVICE_URL; ?>js/lib/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="<?php echo SERVICE_URL; ?>js/lib/swiper/swiper-bundle.min.css">
<script type="text/javascript" src="<?php echo SERVICE_URL; ?>js/scripts.js"></script>
<script src="<?php echo SERVICE_URL; ?>js/smooth_scroll.jq.js"></script>
<script src="<?php echo SERVICE_URL ?>js/keyword.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HYFRXQDMK7"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-HYFRXQDMK7');
</script>
<!-- ▲▲▲全ページ共通▲▲▲ -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6959762897513990" crossorigin="anonymous"></script>
</head>