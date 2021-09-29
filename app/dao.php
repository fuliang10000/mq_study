<?php

declare(strict_types=1);
/**
 * This file is part of Shoplinke.
 * Developed By Middle Platform Team Of Starlinke
 *
 * @link     https://www.starlinke.com
 * @document https://starlink.feishu.cn/docs/doccnuhsKZVumq24kIecc4oefbf
 * $contact  dev@starlinke.com
 */
namespace app;

use common\dao\UserDao;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$user = 'root';
$pass = '123456';
$host = 'localhost';
$database = 'test';
$user = new UserDao($user, $pass, $host, $database);
$userInfo = $user->getUserByFirstName('fuliang');
