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
namespace common\decorator;

class MyObjectDecorator
{
    private $_myObject;

    public function __construct(MyObject $myObject)
    {
        $this->_myObject = $myObject;
    }

    public function decoratorItems()
    {
    }
}
