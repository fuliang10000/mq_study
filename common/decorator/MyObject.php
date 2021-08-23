<?php


namespace common\decorator;


class MyObject
{

    public $_items = [];
    public function showItemsFormatted($items)
    {
        $this->_items = $items;
    }
}