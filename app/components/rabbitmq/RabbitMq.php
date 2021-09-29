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
namespace app\components\rabbitmq;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

/**
 * RabbitMq服务类
 * Class RabbitMq.
 */
class RabbitMq
{
    public $channel; //信道

    public $headers = []; //AMQPTable

    public $exchange = 'exchange'; //交换机

    public $queueName = 'queue'; //队列名称

    public $exchangeType = 'direct'; //交换机类型

    public $route = 'sms_send'; //路由键

    protected $conn;

    protected static $connection;  //静态rabbitMq连接

    /**
     * RabbitMq constructor.
     *
     * @param $conf  array  Mq的默认连接配置
     *               @$conf['host']  rabbitMq配置的ip地址
     *               @$conf['port']  rabbitMq配置的端口号
     *               @$conf['user']  用户名
     *               @$conf['pwd']   密码
     *               @$conf['vhost'] 虚拟host
     *               @$conf['exchange'] 交换机名称
     *               @$conf['queue'] 队列名称
     *               @$conf['route'] 路由键
     *               @$conf['type'] 交换机类型
     */
    public function __construct($conf)
    {
        try {
            $this->conn = new AMQPStreamConnection($conf['host'], $conf['port'], $conf['user'], $conf['pwd'], $conf['vhost']);
            if (isset($conf['exchange'])) {
                $this->exchange = $conf['exchange'];
                $this->route = $conf['exchange'];
            }
            if (isset($conf['queue'])) {
                $this->queueName = $conf['queue'];
            }
            if (isset($conf['route'])) {
                $this->route = $conf['route'];
            }
            if (isset($conf['type'])) {
                $this->exchangeType = $conf['type'];
            }
            $this->getConnection();
        } catch (Exception $e) {
            throw new Exception('cannot connection rabbitMq:' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->conn->close();
    }

    //实例化该service时首先加载的方法：检测是否已经有rabbitMq连接【始终保持是同一连接】
    public static function instance($conf = [])
    {
        require_once __DIR__ . '/config/mq_config.php';
        if ($conf) {
            $mq_conf = array_merge($mq_conf, $conf);
        }
        if (! self::$connection) {
            self::$connection = new self($mq_conf);
        }

        return self::$connection;
    }

    public function getConnection()
    {
        if (! isset($this->channel)) {
            $this->channel = $this->conn->channel();
        }

        $this->createExchange();
    }

    /**
     * 设置application_headers
     * For example, `['x-delay' => 10000]`. 设置延时队列，延时10秒.
     * @param array $headers
     */
    public function setHeaders($headers = [])
    {
        $this->headers = $headers;
    }

    public function createExchange()
    {
        //passive: 消极处理， 判断是否存在队列，存在则返回，不存在直接抛出 PhpAmqpLib\Exception\AMQPProtocolChannelException 异常
        //durable：true、false true：服务器重启会保留下来Exchange。警告：仅设置此选项，不代表消息持久化。即不保证重启后消息还在
        //autoDelete:true、false.true:当已经没有消费者时，服务器是否可以删除该Exchange
        $this->channel->exchange_declare($this->exchange, $this->exchangeType, false, true, false);

        //passive: 消极处理，判断是否存在队列，存在则返回，不存在则直接抛出 PhpAmqpLib\Exception\AMQPProtocolChannelException 异常
        //durable: true/false true :在服务器重启时，能够存活
        //exclusive: 是否为当前连接的专用队列，在连接段开后，会自动删除该队列
        //autodelete: 当没有任何消费者使用时，自动删除该队列
        //arguments: 自定义规则
        $this->channel->queue_declare($this->queueName, false, true, false, false, false);
    }

    /**
     * 绑定消息队列
     * 博主个人看法：在创建交换机与队列的时候，可以手动在rabbitMq界面将二者绑定，没有必要每次进行发送或者消费队列时进行绑定；.
     */
    public function bindQueue()
    {
        $this->channel->queue_bind($this->queueName, $this->exchange, $this->route);
    }

    /**
     * 发送消息.
     *
     * @param $msgBody  string  消息
     * @param $properties  array
     */
    public function sendMsg($msgBody, $properties = ['content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT])
    {
        // content_type: 发送消息的类型
        // delivery_mode: 设置的属性，比如设置该消息持久化['delivery_mode' => 2]
        if (is_array($msgBody)) {
            $msgBody = json_encode($msgBody);
        }
        $msg = new AMQPMessage($msgBody, $properties); //生成消息
        // 设置headers
        if ($this->headers && is_array($this->headers)) {
            $header = new AMQPTable($this->headers);
            $msg->set('application_headers', $header);
        }
        $this->channel->basic_publish($msg, $this->exchange, $this->route); //推送消息到某个交换机
    }

    /**
     * 消费消息.
     *
     * @param $callback callable|null  回调函数 在这里可以添加消费消息的具体逻辑
     */
    public function consumeMsg($callback)
    {
        $this->bindQueue();
        //1.队列名称
        //2.consumer_tag 消费者标签
        //3.no_local false 这个功能属于AMPQ的标准，但是rabbitMq并没有做实现
        //4.no_ack false 收到消息后，是否不需要回复确认即被认为是被消费
        //5.exclusive false 排他消费者，即这个队列只能有一个消费者消费，适用于人物不允许进行并打处理的情况下，比如系统对接
        //6.callback 回调函数
        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume($this->queueName, '', false, false, false, false, $callback);

        //监听消息
        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }
}
