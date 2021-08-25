<?php


namespace common\delegate;


class plsPlayListDelegate
{
    public function getPlayList($songs)
    {
        $pls = "[playlist]\r\nNumberOfEntries=" . count($songs) . "\r\n";
        foreach ($songs as $songCount => $song) {
            $counter = $songCount + 1;
            $pls .= "File{$counter}={$song['location']}\r\n";
            $pls .= "Title{$counter}={$song['title']}\r\n";
            $pls .= "Length{$counter}=-1\r\n";
        }

        return $pls;
    }
}