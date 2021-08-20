<?php


namespace common\builder;


class MyObjectBuilder
{
    protected $_myObject = null;
    public function createInstanceOfMyObject()
    {
        $this->_myObject = new MyObject();
    }
    public function buildOfMyObject()
    {
        $this->_myObject->complexFunctionA();
        $this->_myObject->complexFunctionB();
    }
    public function getBuildOfMyObject()
    {
        return $this->_myObject;
    }
}