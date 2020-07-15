<?php
set_time_limit(0);
require_once __DIR__ . '/components/rabbitmq/RabbitMq.php';
require_once __DIR__ . '/components/rabbitmq/config/mq_config.php';

$mq_conf['exchange'] = 'qq_new';
$mq_conf['queue'] = 'qq_new_q';
$mq_conf['type'] = 'x-delayed-message';
$mq = RabbitMq::instance($mq_conf);
$callback = function ($msg) {
    file_put_contents(__DIR__ . "/logs.txt", date('Y/m/d H:i:s', time()) . " \t输出结果:" . var_export($msg->getBody(), true) . "\r\n\r\n", FILE_APPEND);
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$mq->consumeMsg($callback);
