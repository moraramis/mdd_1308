<?php

require_once "db.php";
require_once "model/authModel.php";
require_once "views/authView.php";

$model = new authModel(MY_DSN, MY_USER, MY_PASS);
$view = new authView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';
$user = NULL;
sec_session_start();

if (!empty($_SESSION['userInfo'])){
    $contentPage = 'success';
    $user = $_SESSION['userInfo'];
}

if (!empty($username) && !empty($password)) {
    $user = $model->getUserByNamePass($username, $password);
    if (is_array($user)) {
        $contentPage = 'success';
        $_SESSION['userInfo'] = $user;
    }
}

$view->show('header', '');
$view->show($contentPage, $user);
$view->show('footer', '');