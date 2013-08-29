<style>

form {
    margin: 0 auto;
}

</style>

<?php
//bringing in my required pages 
require_once('db.php');
require_once('views/authView.php');
require_once('model/authModel.php');

$view = new AuthView();
$view->show('header');
echo('<br /><a href="index.php" class="small button">Back</a>');
$fields = array(
    'userName'=>'User Name',
    'firstName'=>'First Name',
    'lastName'=>'Last Name',
    'email'=>'Email',
    'homeZipcode'=>'Zip Code',
);
//setting up my if else conditionals that will post entered passwords into the db, or throw an error if the fields are blank
if(isset($_POST['submit'])){

    $values = array();
    $userPassword1 = MD5($_POST["userPassword1"]);
    $userPassword2 = MD5($_POST["userPassword2"]);

    if($userPassword1 == '' || $userPassword2 == ''){
        echo "You forgot to enter a password.";

    }elseif($userPassword1 != $userPassword2){
        echo "Your passwords do not match.";

    }else{

        //For each of the fields we want, check if the field was posted, and if so trim it and use it. Otherwise use NULL.
        foreach($fields AS $field=>$label){
            $values[$field] = isset($_POST[$field]) ? trim($_POST[$field]) : NULL;
        }
        $errors = array();
        /*Title and Platform are required. strlen will return the string's length */
        if(!isset($values['userName']) || !strlen($values['userName'])){
            $errors['userName'] = 'Please Enter a User Name';
        }
        if(!isset($values['email']) || !strlen($values['email'])){
            $errors['email'] = 'Please Enter an Email address';
        }

        //If there are any errors, display the form again. Otherwise, insert the data
        if(!count($errors)){
            $sql = "INSERT INTO users(userName, firstName, lastName, email, homeZipcode)
                VALUES (?, ?, ?, ?, ?);
           UPDATE users SET userPassword = MD5(CONCAT('userSalt','userPassword'))";

            $stmt = $db->prepare($sql);

            $result = $stmt->execute(array_values($values));
        }
    }
}
?>

<?php
//If the form was submitted and an insert was attempted, display a message.
if(isset($result)){
    if($result){
        header ("Location: thanks.html");
        exit;
        // echo '<b>Thanks for Signing up  with InterestPoint!</b>';
    }else{
        echo '<b>Unable to Signup for the following reasons: </b>';
        print '<pre>'.print_r($stmt->errorInfo(), true);
    }
}
?>

<h1>Your Information</h1>
<form method="post" action="signup.php">
    <?php
    foreach($fields AS $field=>$label){

        echo "<label>{$label}:";
        //If the field had an error, display it.
        if(isset($errors[$field])){
            echo ' <span class="error">'.$errors[$field].'</span>';
        }
        //Echo the actual input. If the form is being displayed with errors, we'll have a value to fill in from the user's previous submission.
        echo '<input type="text" name="'.$field.'"';
        if(isset($values[$field])){
            echo ' value="'.$values[$field].'"';
        }
        echo '/></label><br /><br />';
    }

    ?>
    <p><label for="userPassword1">Type a Password</label>
    <input name="userPassword1" type="password"></p>
    <p> <label for="userPassword2">Re-Type your password</label>
    <input name="userPassword2" type="password"></p>
    <p>By Clicking Submit You Agree to Our <a href="tos_page.php">Terms of Service</a></p>
    <input class="button success"type="submit" name="submit" value="Sign Up!" />
</form>
