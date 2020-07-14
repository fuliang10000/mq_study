<?php
require_once __DIR__ . '/components/rabbitmq/RabbitMq.php';
require_once __DIR__ . '/components/rabbitmq/config/mq_config.php';

$mq = RabbitMq::instance($mq_conf);
$callback = function ($msg) {
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$mq->consumeMsg($callback);
