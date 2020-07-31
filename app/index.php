<?php
namespace app;
require_once dirname(__DIR__) . '/vendor/autoload.php';
use app\components\rabbitmq\RabbitMq;

$mq_conf['exchange'] = 'qq_new';
$mq_conf['queue'] = 'qq_new_q';
$mq_conf['type'] = 'x-delayed-message';
$mq = RabbitMq::instance($mq_conf);
$mq->setHeaders(['x-delay' => 10000]);
$msgBody = ["name" => "mq", "age" => 26 . '_' . time()];
$mq->sendMsg($msgBody);
