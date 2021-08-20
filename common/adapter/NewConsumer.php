<?php


namespace common\adapter;


class NewConsumer
{
    public function doSomething()
    {
        $myObject = new MyObjectAdapterForNewConsumer();
        $myObject->methodB();
    }
}