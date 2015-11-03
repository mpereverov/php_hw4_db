<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 23.10.15
 * Time: 19:24
 */

require_once 'vendor/autoload.php';

use MyCompany\Administrator;
use MyCompany\User;

$admin = new Administrator('Ivan', 'Sobakin');
$admin->setGroup('Administrators');
echo $admin;

$user = new User('Nik', 'Yuzov');
$user->setGroup('Users');
//$user->__toString();
echo $user;