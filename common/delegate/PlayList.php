<?php


namespace common\delegate;


class PlayList
{
    private $__songs;

    public function __construct()
    {
        $this->__songs = [];
    }

    public function addSong($location, $title)
    {
        $song = ['location' => $location, 'title' => $title];
        $this->__songs[] = $song;
    }

    public function getM3U()
    {
        $m3u = "EXTM3U\r\n";
        foreach ($this->__songs as $song) {
            $m3u .= "#EXTINF:-1, {$song['title']}\r\n";
            $m3u .= "{$song['location']}\r\n";
        }

        return $m3u;
    }

    public function getPLS()
    {
        $pls = "[playlist]\r\nNumberOfEntries=" . count($this->__songs) . "\r\n";
        foreach ($this->__songs as $songCount => $song) {
            $counter = $songCount + 1;
            $pls .= "File{$counter}={$song['location']}\r\n";
            $pls .= "Title{$counter}={$song['title']}\r\n";
            $pls .= "Length{$counter}=-1\r\n";
        }

        return $pls;
    }
}