<?php


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

        file_put_contents(dirname(dirname(__DIR__)) . "/logs/" . self::LOCATION, $line, FILE_APPEND);
    }
}