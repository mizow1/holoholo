<?php 
session_start();
require_once('../lib/template.php');
require_once('../lib/functions.php');
$tpl = new MyTemplate();

$tpl->meta_info = meta_info()['privacy'];
$tpl->show(SERVICE_PATH.'template/privacy.php');
