<?php


namespace common\delegate;


class m3uPlayListDelegate
{
    public function getPlayList($songs)
    {
        $m3u = "EXTM3U\r\n";
        foreach ($songs as $song) {
            $m3u .= "#EXTINF:-1, {$song['title']}\r\n";
            $m3u .= "{$song['location']}\r\n";
        }

        return $m3u;
    }
}