<?php
require_once "views/authView.php";
$view = new authView();
sec_session_start();
$view->show('header');

echo('
<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file">Photo:</label>
<input type="file" name="file" id="file"><br />
<br />
<label for="firstName">First Name</label>
<input type="text" name="firstName" id="firstName"><br />
<label for="lastName">Last Name</label>
<input type="text" name="lastName" id="lastName"><br />
<br />
<label for="bio">Bio</label>
<textarea rows="50" cols="50" name="bio"></textarea><br />
<br />
<input type="submit" name="submit" value="Submit" class ="success button">
</form>
');

$view->show('footer');
?>