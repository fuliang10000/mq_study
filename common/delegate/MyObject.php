<?php


namespace common\delegate;


class MyObject
{

    private $delegateType = '';
    private $internalDelegate = null;

    public function setDelegateType($type)
    {
        $this->delegateType = $type;
    }
    public function createDelegateObject()
    {
    }
    public function runDelegateAction()
    {
        $this->internalDelegate->action();
    }
}