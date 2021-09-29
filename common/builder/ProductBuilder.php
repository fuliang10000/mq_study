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
namespace common\builder;

class ProductBuilder
{
    protected $_product;

    protected $_configs = [];

    public function __construct($configs)
    {
        $this->_product = new Product();
        $this->_configs = $configs;
    }

    public function build()
    {
        $this->_product->setSize($this->_configs['size']);
        $this->_product->setType($this->_configs['type']);
        $this->_product->setColor($this->_configs['color']);
    }

    public function getProduct()
    {
        return $this->_product;
    }
}
