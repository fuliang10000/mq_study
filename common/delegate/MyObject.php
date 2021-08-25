<?php


namespace common\delegate;


class MyObject
{

    private $delegateType = '';
    private $internalDelegate = null;

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