<?php


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