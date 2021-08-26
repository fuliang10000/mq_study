<?php


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