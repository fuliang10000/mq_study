<?php
namespace app;

use common\dao\UserDao;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$user = 'root';
$pass = '123456';
$host = 'localhost';
$database = 'test';
$user = new UserDao($user, $pass, $host, $database);
$userInfo = $user->getUserByFirstName('fuliang');
