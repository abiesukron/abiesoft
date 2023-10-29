<?php

namespace AbieSoft\Application\Collection;

use AbieSoft\Application\Mysql\DB;

trait Get
{

    protected static function getAll(
        string $tabel = "",
        array $select = [],
        string $output = "",
        string $orderby = "",
        string $limit = "",
        bool $asc = true
    ) {

        if (count($select) == 0) {
            $select = "*";
        } else {
            $itemselect = "";
            $karakter = ", ";
            for ($i = 0; $i < count($select); $i++) {
                if ($i + 1 == count($select)) {
                    $karakter = "";
                }
                $itemselect .= $select[$i] . $karakter;
            }
            $select = $itemselect;
        }

        if ($orderby != "") {
            $orderby = " ORDER BY " . $orderby;
        }

        if (!$asc) {
            $asc = "DESC";
        } else {
            $asc = "";
        }

        if($limit != ""){
            $limit = " LIMIT ".$limit;
        }else{
            $limit = "";
        }

        $sql = "SELECT {$select} FROM {$tabel} {$orderby} {$asc} {$limit}";

        return match ($output) {
            'hitung' => DB::terhubung()->query($sql)->hitung(),
            'json' => DB::terhubung()->query($sql)->json(),
            default => DB::terhubung()->query($sql)->hasil()
        };
    }

    protected static function getOnly(
        string $tabel = "",
        array $select = [],
        string $output = "",
        string $id = "",
        string $orderby = "",
        bool $asc = true
    ) {

        if (count($select) == 0) {
            $select = "*";
        } else {
            $itemselect = "";
            $karakter = ", ";
            for ($i = 0; $i < count($select); $i++) {
                if ($i + 1 == count($select)) {
                    $karakter = "";
                }
                $itemselect .= $select[$i] . $karakter;
            }
            $select = $itemselect;
        }

        if ($orderby != "") {
            $orderby = " ORDER BY " . $orderby;
        }

        if (!$asc) {
            $asc = "DESC";
        } else {
            $asc = "";
        }

        $sql = "SELECT {$select} FROM {$tabel} WHERE id = '{$id}' {$orderby} {$asc} ";

        return match ($output) {
            'hitung' => DB::terhubung()->query($sql)->hitung(),
            'json' => DB::terhubung()->query($sql)->json(),
            'string' => self::toString(DB::terhubung()->query($sql)->hasil(), $select),
            default => DB::terhubung()->query($sql)->hasil()
        };
    }

    protected static function toString($obj, $select): string
    {
        $result = "";
        foreach ($obj as $o) {
            $result = $o->$select;
        }
        return $result;
    }
}
