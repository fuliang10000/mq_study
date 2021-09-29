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

class CdUpperCase
{
    public static function makeString(Cd $cd, $type)
    {
        $cd->{$type} = strtoupper($cd->{$type});
    }

    public static function makeArray(Cd $cd, $type)
    {
        $cd->{$type} = array_map('strtoupper', $cd->{$type});
    }
}
