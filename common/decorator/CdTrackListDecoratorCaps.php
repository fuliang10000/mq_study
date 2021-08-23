<?php


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