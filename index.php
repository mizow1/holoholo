<?php 
ini_set('display_errors',1);
require_once('lib/template.php');
require_once('lib/functions.php');
$tpl = new MyTemplate();

header('location:'.SERVICE_URL.'/top',true,301);
exit;
