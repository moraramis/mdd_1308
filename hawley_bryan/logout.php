<?php

//My logout that will destroy my secure session upon clicking the logout button
require_once "views/authView.php";

sec_session_start();

unset($_SESSION['userInfo']);

session_destroy();
//redirects user to login page once logged out
header('Location: index.php');
exit;
?>