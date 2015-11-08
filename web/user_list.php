<?php

use Layer\Manager\UserManager;
use Layer\Entity\User;

$user = new User;
$users = new UserManager;
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Users</h1>
        <a href="user_form.php">Create new user</a><br>
        <ul>
            <?php foreach ($users->findAll() as $usr) { ?>
                <li>
                    <?php print $user->getFirstName(); ?>
                    <?php print $user->getLastName(); ?>
                </li>
            <?php } ?>
        </ul>
    </body>
</html>
