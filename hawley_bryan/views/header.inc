<!DOCTYPE html>
<html>
<head>
    <title>InterestPoint</title>
    <!--Placing a link to my css stylesheet here so it'll display on every page that includes my header.inc page. -->
    <link rel="stylesheet" href="css/foundation.css">

</head>
<body>
<a href="index.php"><img src="img/logo.png" /></a>
<?php
require_once "db.php";
require_once "model/authModel.php";
require_once "views/authView.php";

//My Navigation buttons that only show up if the user is logged in
if (isset($_SESSION['userInfo'])){
    echo '<ul><li><a href="hotspots.php" class="small button">Hot Spots</a></li>', '<li><a href="profile_signup.php" class="small button">Profile</a></li>', '<li><a href="logout.php" class="small button">Logout</a></li></ul>';
}
?>
</body>
</html>