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

class PlsPlayListDelegate
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
