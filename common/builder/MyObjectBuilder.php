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

class MyObjectBuilder
{
    protected $_myObject;

    public function createInstanceOfMyObject()
    {
        $this->_myObject = new MyObject();
    }

    public function buildOfMyObject()
    {
        $this->_myObject->complexFunctionA();
        $this->_myObject->complexFunctionB();
    }

    public function getBuildOfMyObject()
    {
        return $this->_myObject;
    }
}
