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

class NewConsumer
{
    public function doSomething()
    {
        $myObject = new MyObjectAdapterForNewConsumer();
        $myObject->methodB();
    }
}
