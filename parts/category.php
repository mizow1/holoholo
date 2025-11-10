<?php 
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
require_once('../../parts/log.php');
$tpl = new MyTemplate();


if($_GET['menu']&&$_GET['mode']=='entry'){
	require_once('entry.php');
}elseif($_GET['menu']&&$_GET['mode']=='result'){
	require_once('result.php');
}else{
	require_once('menu_list.php');
}