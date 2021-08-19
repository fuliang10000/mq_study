<?php


namespace common;


class NewConsumer
{
    public function doSomething()
    {
        $myObject = new MyObjectAdapterForNewConsumer();
        $myObject->methodB();
    }
}