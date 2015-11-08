<?php

require_once __DIR__ . '/../bootstrap.php';

use Layer\Entity\User;
use Layer\Entity\Group;
use Layer\Manager\UserManager;
use Layer\Manager\GroupManager;

if (isset($_POST['do_create_user'])) {
    $user = new User();
    $user->setFirstName($_POST['firstName']);
    $user->setLastName($_POST['lastName']);
    $user->setPassword($_POST['password']);
    $user->setDescription($_POST['description']);
    $user->setGroup($_POST['group']);

    $userManager->save($user);
    
    header('Location: /user_list.php');
}
?>
<html>
    <body>
        <h2>Create new user</h2>
        <form method="post" name="setUserProperties">
            <input type="text" name="firstName" size="20" maxlength="50" placeholder="First Name"></br>
            <input type="text" name="lastName" size="20" maxlength="50" placeholder="Last Name"></br>
            <input type="password" name="password" size="20" maxlength="50" placeholder="Password"></br>
            <span>Description</span></br>
            <textarea name="description" cols="31" rows="3" wrap="virtual"></textarea></br>
            <span>Select Group</span></br>
            <select name="group">
                <?php foreach ($groupManager->findAll() as $group) { ?>
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