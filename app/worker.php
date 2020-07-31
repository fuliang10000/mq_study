<?php
namespace app;
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/components/rabbitmq/config/mq_config.php';
use app\components\rabbitmq\RabbitMq;
set_time_limit(0);

$mq_conf['exchange'] = 'qq_new';
$mq_conf['queue'] = 'qq_new_q';
$mq_conf['type'] = 'x-delayed-message';
$mq = RabbitMq::instance($mq_conf);
$callback = function ($msg) {
    file_put_contents(dirname(__DIR__) . "/logs.txt", date('Y/m/d H:i:s', time()) . " \t输出结果:" . var_export($msg->getBody(), true) . "\r\n\r\n", FILE_APPEND);
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$mq->consumeMsg($callback);
