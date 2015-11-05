

<html>
    <body>

    <form  method="POST" name="setUserProperties" action="home.php">
        <input type="text" name="firstName" size="20" maxlength="50" value="First Name"></br>
        <input type="text" name="lasttName" size="20" maxlength="50" value="Last Name"></br>
        <input type="password" name="password" size="20" maxlength="50" value="Password"></br>
        <input type="text" name="login" size="20" maxlength="50" value="Login"></br>
        <textarea name="user_descr" cols="31" rows="3" wrap="virtual"></textarea></br>
        <select name="group" size="4" multiple>
            <option value="adm">Administrators
            <option selected value="usrs">Users
            <option  value="adv_usrs">Advanced Users
            <option value="gst">Guests
        </select>
        <input type="submit" name="submit" value="OK">
    </form>

    </body>
<html>
<?php
print_r($_POST);
?>