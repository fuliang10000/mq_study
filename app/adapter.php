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

use common\adapter\ErrorObject;
use common\adapter\LogToConsole;
use common\adapter\LogToCSV;
use common\adapter\LogToCSVAdapter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//$error = new ErrorObject("404:Not Found");
//$log = new LogToConsole($error);
//$log->write();

$error = new LogToCSVAdapter('401:Not Found');
$log = new LogToCSV($error);
$log->write();
