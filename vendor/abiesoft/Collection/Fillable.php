<?php

namespace AbieSoft\Application\Collection;

class Fillable
{
    public static array $set = [];

    public static function data()
    {
        return self::$set;
    }
}
