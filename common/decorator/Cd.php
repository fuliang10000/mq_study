<?php


namespace common\decorator;


class Cd
{
    public $trackList;

    public function __construct()
    {
        $this->trackList = [];
    }

    public function addTrack($track)
    {
        $this->trackList[] = $track;
    }

    public function getTrackList()
    {
        $output = '';
        foreach ($this->trackList as $key => $value) {
            $output .= ($key+1) . ") {$value}. ";
        }

        return $output;
    }
}