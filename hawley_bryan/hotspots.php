<?php

require_once "db.php";

require_once "model/userModel.php";
require_once "views/userView.php";
require_once "views/authView.php";

$model = new userModel(MY_DSN, MY_USER, MY_PASS);
$view = new userView();

sec_session_start();

$userId = $db->query('SELECT DISTINCT homeZipcode FROM users');

$user = NULL;

$contentPage = 'showLocation';

$view->show('header', '');
$view->show($contentPage, $user);
$view->show('footer', '');

?>