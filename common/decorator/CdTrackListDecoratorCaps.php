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

class CdTrackListDecoratorCaps
{
    private $__cd;

    public function __construct(Cd $cd)
    {
        $this->__cd = $cd;
    }

    public function makeCaps()
    {
        foreach ($this->__cd->trackList as &$track) {
            $track = strtoupper($track);
        }
    }
}
