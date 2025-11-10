<?php 
require_once('../lib/template.php');
require_once('../lib/functions.php');
$tpl = new MyTemplate();

$tpl->comment_data = '';
$tpl->meta_info = meta_info()['yesno']['entry'];
$tpl->show(SERVICE_PATH.'template/yesno_top.php');