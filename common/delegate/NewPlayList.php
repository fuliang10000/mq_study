<?php

declare(strict_types=1);
/**
 * This file is part of Shoplinke.
 * Developed By Middle Platform Team Of Starlinke
 *
 * @link     https://www.starlinke.com
 * @document https://starlink.feishu.cn/docs/doccnuhsKZVumq24kIecc4oefbf
 * $contact  dev@starlinke.com
 */
namespace common\delegate;

class NewPlayList
{
    private $__songs;

    private $__typeObject;

    public function __construct($type)
    {
        $this->__songs = [];
        $object = 'common\\delegate\\' . ucwords($type) . 'PlayListDelegate';
        $this->__typeObject = new $object();
    }

    public function addSong($location, $title)
    {
        $song = ['location' => $location, 'title' => $title];
        $this->__songs[] = $song;
    }

    public function getPlayList()
    {
        return $this->__typeObject->getPlayList($this->__songs);
    }
}
