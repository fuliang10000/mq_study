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

class LogToCSVAdapter extends ErrorObject
{
    private $__errorCode;

    private $__errorText;

    public function __construct($error)
    {
        parent::__construct($error);
        $parts = explode(':', $this->getError());

        $this->__errorCode = $parts[0];
        $this->__errorText = $parts[1];
    }

    /**
     * @return mixed|string
     */
    public function getErrorCode()
    {
        return $this->__errorCode;
    }

    /**
     * @return mixed|string
     */
    public function getErrorText()
    {
        return $this->__errorText;
    }
}
