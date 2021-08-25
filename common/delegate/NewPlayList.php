<?php


namespace common\delegate;


class NewPlayList
{
    private $__songs;
    private $__typeObject;

    public function __construct($type)
    {
        $this->__songs = [];
        $object = "common\\delegate\\{$type}PlayListDelegate";
        $this->__typeObject = new $object;
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