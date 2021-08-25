<?php
namespace app;

use common\delegate\MyObject;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$myObject = new MyObject();
$myObject->setDelegateType('A')->createDelegateObject()->runDelegateAction();
$myObject->setDelegateType('B')->createDelegateObject()->runDelegateAction();
