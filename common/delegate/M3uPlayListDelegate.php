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

class M3uPlayListDelegate
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
