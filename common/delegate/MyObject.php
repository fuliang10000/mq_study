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
namespace common\delegate;

class MyObject
{
    private $delegateType = '';

    private $internalDelegate;

    public function setDelegateType($type)
    {
        $this->delegateType = $type;

        return $this;
    }

    public function createDelegateObject()
    {
        $objectClass = 'common\delegate\MyDelegateObject' . $this->delegateType;
        $this->internalDelegate = new $objectClass();

        return $this;
    }

    public function runDelegateAction()
    {
        $this->internalDelegate->action();
    }
}
