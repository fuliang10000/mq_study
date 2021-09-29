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
            $output .= ($key + 1) . ") {$value}. ";
        }

        return $output;
    }
}
