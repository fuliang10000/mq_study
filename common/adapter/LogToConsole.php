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
namespace common\adapter;

class LogToConsole
{
    private $__errorObject;

    public function __construct(ErrorObject $errorObject)
    {
        $this->__errorObject = $errorObject;
    }

    public function write()
    {
        echo $this->__errorObject->getError() . "\r\n";
    }
}
