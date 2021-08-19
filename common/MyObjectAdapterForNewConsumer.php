<?php


namespace common;


class MyObjectAdapterForNewConsumer
{

    public function methodB()
    {
        $myObject = new MyObject();
        $myObject->methodA();
    }
}