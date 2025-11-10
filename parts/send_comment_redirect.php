<?php
session_start();
$_SESSION['comment_send'] = 1;

header('location:'.$_SESSION['return_url'].'#my_comment');