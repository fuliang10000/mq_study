<?php


namespace common\adapter;


class OriginalConsumer
{
    public function doSomething()
    {
        $myObject = new MyObject();
        $myObject->methodA();
    }
}