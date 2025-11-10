<?php 
require_once('../lib/template.php');
require_once('../lib/functions.php');
$tpl = new MyTemplate();

header('location:'.SERVICE_URL.'graph/raw/');