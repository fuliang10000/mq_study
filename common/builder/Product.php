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

class Product
{
    protected $_type = '';

    protected $_size = '';

    protected $_color = '';

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }
}
