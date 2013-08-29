<form action="submit.php" method="post" id='report_form'>
    <p>Contact InterestPoint or report a Problem</p>
    <label for="userName">Username</label>
    <input name='userName' type='text' id='userName'  />
    <label for="firstName">First Name</label>
    <input name='firstName' type='text' id='firstName' />
    <label for="lastName">Last Name</label>
    <input name='lastName' type='text' id='lastName' />
    <label for="email">Email</label>
    <input name='email' type='email' id='email' /> <br />
    <p>Select a reason for Contacting InterestPoint</p>
    <select name='reason' required form='report_form'>
        <option value='problem'>Problems with InterestPoint</option>
        <option value='question'>Questions for InterestPoint</option>
    </select><br />
    <p>Put the details here.</p>
    <textarea rows='50' cols='50' name='details'>

    </textarea>
    <p><input type='button' class='success button' name='submit' id='submit' value='Submit'></p>
</form>
