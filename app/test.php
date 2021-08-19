<?php
namespace app;
use common\NewConsumer;
use common\OriginalConsumer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

(new OriginalConsumer())->doSomething();
(new NewConsumer())->doSomething();