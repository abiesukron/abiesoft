<?php

namespace AbieSoft\Application\Collection;

trait Data
{

    use Get, Join, Post, Patch, Remove;

    protected static function tabel(string $tabel = "")
    {
        if ($tabel != "") {
            return $tabel;
        }
        return strtolower(explode("\\", __CLASS__)[2]);
    }

    public static function insert(
        string $tabel = "",
    ) {
        $tabel = self::tabel($tabel);
        return self::doPost($tabel);
    }

    public static function replace(
        string $tabel = "",
    ) {
        $tabel = self::tabel($tabel);
        return self::doPatch($tabel);
    }

    public static function remove(
        string $tabel = "",
    ) {
        $tabel = self::tabel($tabel);
        return self::doRemove($tabel);
    }

    public static function all(
        string $tabel = "",
        array $select = [],
        string $output = "",
        string $orderby = "",
        string $limit = "",
        bool $asc = true
    ) {
        $tabel = self::tabel($tabel);
        return self::getAll($tabel, $select, $output, $orderby, $limit, $asc);
    }

    public static function only(
        string $tabel = "",
        array $select = [],
        string $output = "",
        string $id = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $tabel = self::tabel($tabel);
        return self::getOnly($tabel, $select, $output, $id, $orderby, $asc);
    }



    /*
        JOIN TABEL
    */

    public static function innerJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $tabel = self::tabel($from);
        return self::getInnerJoin($select, $tabel, $join, $output, $orderby, $asc);
    }

    public static function leftJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $tabel = self::tabel($from);
        return self::getLeftJoin($select, $tabel, $join, $output, $orderby, $asc);
    }

    public static function rightJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $tabel = self::tabel($from);
        return self::getRightJoin($select, $tabel, $join, $output, $orderby, $asc);
    }
}
