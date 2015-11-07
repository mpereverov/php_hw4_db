<?php
require_once 'vendor/autoload.php';

use Layer\Entity\User;
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Users</h1>
        <a href="user_form.php">Create new user</a>
        <ul>
            <?php foreach ($userManager->findAll() as $user) { ?>
                <li><?php print $user->getFirstName(); ?> <?php print $user->getLastName(); ?></li>
            <?php } ?>
        </ul>
    </body>
</html>
