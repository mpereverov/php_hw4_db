<?php
require_once 'vendor/autoload.php';

use Layer\Entity\User;
use Layer\Manager\UserManager;

if (isset($_POST['do_create_user'])) {
    $user = new User();
    $user->setFirstName($_POST['firstName']);
    $user->setLastName($_POST['lastName']);
    //...
    
    $userManager->save($user);
    
    header('Location: /user_list.php');
}
$groups = $groupManager->findBy(['active' => 1]);
?>
<html>
    <body>
        <h1>Create new user</h1>
        <form method="post" name="setUserProperties">
            <input type="text" name="firstName" size="20" maxlength="50" value="First Name"></br>
            <input type="text" name="lastName" size="20" maxlength="50" value="Last Name"></br>
            <input type="password" name="password" size="20" maxlength="50" value="Password"></br>
            <input type="text" name="login" size="20" maxlength="50" value="Login"></br>
            <textarea name="user_descr" cols="31" rows="3" wrap="virtual"></textarea></br>
            <select name="group" size="4" multiple="multiple">
                <?php foreach ($groups as $group) { ?>
                    <option value="<?php print $group->getId(); ?>">
                        <?php print $group->getName(); ?>
                    </option>
                <?php } ?>
            </select><br/>
            <input type="submit" name="do_create_user" value="Send">
        </form>
        <a href="/">Cancel</a>
    </body>
<html>