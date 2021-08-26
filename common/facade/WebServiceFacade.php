<?php


namespace common\facade;


class WebServiceFacade
{
    public static function makeXMLCall(Cd $cd)
    {
        CdUpperCase::makeString($cd, 'title');
        CdUpperCase::makeString($cd, 'band');
        CdUpperCase::makeArray($cd, 'tracks');

        return CdMakeXML::create($cd);
    }
}