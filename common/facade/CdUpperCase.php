<?php


namespace common\facade;


class CdUpperCase
{
    public static function makeString(Cd $cd, $type)
    {
        $cd->$type = strtoupper($cd->$type);
    }

    public static function makeArray(Cd $cd, $type)
    {
        $cd->$type = array_map('strtoupper', $cd->$type);
    }
}