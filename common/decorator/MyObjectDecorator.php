<?php


namespace common\decorator;


class MyObjectDecorator
{

    private $_myObject = null;

    public function __construct(MyObject $myObject)
    {
        $this->_myObject = $myObject;
    }

    public function decoratorItems()
    {
        
    }
}