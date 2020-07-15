<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/components/rabbitmq/config/mq_config.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

$exchangeName = 'qq_new'; //交换机名
$queueName = 'qq_new_q'; //队列名称
$routingKey = 'sms_send'; //路由关键字(也可以省略)

$conn = new AMQPStreamConnection( //建立生产者与mq之间的连接
    $mq_conf['host'], $mq_conf['port'], $mq_conf['user'], $mq_conf['pwd'], $mq_conf['vhost']
);
$channel = $conn->channel(); //在已连接基础上建立生产者与mq之间的通道

$channel->exchange_declare($exchangeName, 'x-delayed-message', false, true, false); //声明初始化交换机
$channel->queue_declare($queueName, false, true, false, false); //声明初始化一条队列
$channel->queue_bind($queueName, $exchangeName, $routingKey); //将队列与某个交换机进行绑定，并使用路由关键字

$msgBody = json_encode(["name" => "mq", "age" => 26 . '_' . time()]);
$msg = new AMQPMessage($msgBody, ['content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]); //生成消息
$header = new AMQPTable(['x-delay' => 10000]);
$msg->set('application_headers', $header);
$channel->basic_publish($msg, $exchangeName, $routingKey); //推送消息到某个交换机
$channel->close();
$conn->close();