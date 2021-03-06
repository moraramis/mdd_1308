<?php
//bringing in my required pages
require_once "db.php";
require_once "model/userModel.php";
require_once "views/userView.php";
require_once "views/authView.php";

$model = new userModel(MY_DSN, MY_USER, MY_PASS);
$view = new userView();
//Secured Session Start from authView.php
sec_session_start();

$user = NULL;
//displays my showLocation.inc page. 
$contentPage = 'showLocation';
//bringing in my different views
$view->show('header', '');
$view->show($contentPage, $user);
$view->show('footer', '');

?>