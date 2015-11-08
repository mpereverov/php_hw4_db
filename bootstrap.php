<?php

require_once __DIR__ . '/vendor/autoload.php';

use Layer\Connector\ConnectorPDO;
use Layer\Manager\GroupManager;
use Layer\Manager\UserManager;

$config = include __DIR__ . '/config/db.php';
$connection = (new ConnectorPDO())->connect($config);
$groupManager = new GroupManager($connection);
$userManager = new UserManager($connection);