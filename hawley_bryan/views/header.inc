<!DOCTYPE html>
<html>
<head>
    <title>InterestPoint</title>
    <link rel="stylesheet" href="css/foundation.css">
</head>
<body>

<?php
require_once "db.php";
require_once "model/authModel.php";
require_once "views/authView.php";

if (isset($_SESSION['userInfo'])){
    echo '<ul><li><a href="hotspots.php" class="small button">Hot Spots</a></li>', '<li><a href="logout.php" class="small button">Logout</a></li></ul>';
}
?>
</body>
</html>