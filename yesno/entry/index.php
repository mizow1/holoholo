<?php 
session_start();
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
$tpl = new MyTemplate();

//鑑定テーマ
$_SESSION['yesno_theme'] = $_GET['theme'];

$tpl->comment_data = '';
$tpl->yesno_theme = $_SESSION['yesno_theme'];
$tpl->meta_info = meta_info()['yesno'][$_GET['theme']];
$tpl->show(SERVICE_PATH.'template/yesno_entry.php');