<?php
namespace app;
use common\adapter\NewConsumer;
use common\adapter\OriginalConsumer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

(new OriginalConsumer())->doSomething();
(new NewConsumer())->doSomething();