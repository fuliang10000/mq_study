<?php


namespace common\adapter;


class MyObjectAdapterForNewConsumer
{

    public function methodB()
    {
        $myObject = new MyObject();
        $myObject->methodA();
    }
}