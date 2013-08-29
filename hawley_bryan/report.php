<!DOCTYPE html>
<html>
    <head>
        <title>InterestPoint</title>
        <link rel="stylesheet" href="css/foundation.css">
    </head>
    <body>
        <a href="index.php"><img src="img/logo2.png"></a>
            <!-- The form action has been removed because the development environment WAMP does not allow for email calls.
                Instead, I bypass the form processing script, and go to the Thanks page. You can see the form proccessing
                script inside the submit.php -->
        <form action='thankyou.php' id='submit_form'>
            <h2>Contact InterestPoint or report a Problem</h2>
            <label for='userName'>Username</label>
            <input name='userName' type='text' id='userName'  />
            <label for='firstName'>First Name</label>
            <input name='firstName' type='text' id='firstName' />
            <label for='lastName'>Last Name</label>
            <input name='lastName' type='text' id='lastName' />
            <label for='email'>Email</label>
            <input name='email' type='email' id='email' /> <br />
            <p>Select a reason for Contacting InterestPoint</p>
            <select name='reason'>
                <option value='problem'>Problems with InterestPoint</option>
                <option value='question'>Questions for InterestPoint</option>
            </select><br />
            <p>Put the details here.</p>
            <textarea rows='50' cols='50' name='details'></textarea>

        </form>
        <a href="thankyou.php" class="success button">Submit</a>
    </body>
        <p>Copyright 2013 - 919 Web/Media - InterestPoint | Location data Powered by FourSquare</p>
</html>
