<?php
//Bringing in other pages so vars and functions can be used 
require_once "db.php";
require_once "model/authModel.php";
require_once "views/authView.php";

$model = new authModel(MY_DSN, MY_USER, MY_PASS);
$view = new authView();
//Log in 
$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';
$user = NULL;
//My Secured Session start that calls out a function i've set up in authView.php
sec_session_start();

//My if conditional that will display the success.inc page if log in was successful
if (!empty($_SESSION['userInfo'])){
    $contentPage = 'success';
    $user = $_SESSION['userInfo'];
}

if (!empty($username) && !empty($password)) {
    $user = $model->getUserByNamePass($username, $password);
    if (is_array($user)) {
        $contentPage = 'success';
        $_SESSION['userInfo'] = $user;
    }else{

    	"Please Log in";
    }
}
//bringing in my various views 
$view->show('header', '');
$view->show($contentPage, $user);
$view->show('footer', '');