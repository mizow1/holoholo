<?php
ini_set('display_errors',1);
require_once('../../lib/template.php');
require_once('../../lib/functions.php');
require_once('../../parts/log.php');
$tpl = new MyTemplate();

$tpl->show(SERVICE_PATH.'template/pv_daily.php');