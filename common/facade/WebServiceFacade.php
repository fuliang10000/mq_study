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
