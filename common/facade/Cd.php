<?php


namespace common\facade;


class Cd
{
    public $tracks = array();
    public $band = '';
    public $title = '';

    public function __construct($title, $band, $tracks)
    {
        $this->title = $title;
        $this->band = $band;
        $this->tracks = $tracks;
    }
}