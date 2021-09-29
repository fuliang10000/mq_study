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

class LogToCSV
{
    const LOCATION = 'log.csv';

    private $__errorObject;

    public function __construct(ErrorObject $errorObject)
    {
        $this->__errorObject = $errorObject;
    }

    public function write()
    {
        $line = $this->__errorObject->getErrorCode();
        $line .= ',';
        $line .= $this->__errorObject->getErrorText();
        $line .= "\r\n";

        file_put_contents(dirname(dirname(__DIR__)) . '/logs/' . self::LOCATION, $line, FILE_APPEND);
    }
}
