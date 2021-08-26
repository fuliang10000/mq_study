<?php


namespace common\adapter;


class ErrorObject
{
    private $__error;

    public function __construct($error)
    {
        $this->__error = $error;
    }

    public function getError()
    {
        return $this->__error;
    }
}