<?php


namespace common\facade;


class CdMakeXML
{
    public static function create(Cd $cd)
    {
        $doc = new \DomDocument();

        $root = $doc->createElement('CD');
        $root = $doc->appendChild($root);

        $title = $doc->createElement('TITLE', $cd->title);
        $title = $doc->appendChild($title);

        $band = $doc->createElement('BAND', $cd->band);
        $band = $doc->appendChild($band);

        $tracks = $doc->createElement('TRACKS');
        $tracks = $doc->appendChild($tracks);

        foreach ($cd->tracks as $track) {
            $track = $doc->createElement('TRACK', $track);
            $track = $doc->appendChild($track);
        }

        return $doc->saveXML();
    }
}