<?php
require_once dirname(__DIR__) . '/config/mq_config.php';
require_once __DIR__ . '/components/RabbitMq.php';

$mq = RabbitMq::instance($mq_conf);
$callback = function ($msg) {
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$mq->consumeMsg($callback);
