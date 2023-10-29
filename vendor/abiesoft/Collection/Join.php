<?php

namespace AbieSoft\Application\Collection;

use AbieSoft\Application\Mysql\DB;

trait Join
{

    protected static function getInnerJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $iselect = "";
        $no1 = 1;
        foreach ($select as $s) {
            if (count($select) == $no1) {
                $iselect .= $s;
            } else {
                $iselect .= $s . ", ";
            }
            $no1++;
        }

        $simbolbuka = "";
        if (count($join) == 1) {
            $from = $from;
        } else {
            for ($s = 1; $s <= count($join); $s++) {
                $simbolbuka .= "(";
            }
            $from = $simbolbuka . $from;
        }

        $simboltutup = "";

        if (count($join) == 1) {
            $simboltutup = "";
        } else {
            $simboltutup = ")";
        }

        $datajoin = "";
        foreach ($join as $jk => $jv) {
            foreach ($jv as $jvk => $jvv) {
                $datajoin .= " INNER JOIN " . $jk . " ON " . $jvk . " = " . $jvv . $simboltutup;
            }
        }

        if ($orderby != "") {
            $orderby = " ORDER BY " . $orderby;
        }

        if (!$asc) {
            $asc = "DESC";
        } else {
            $asc = "";
        }

        $sql = "SELECT {$iselect} FROM {$from} {$datajoin} {$orderby} {$asc} ";

        return match ($output) {
            'json' => DB::terhubung()->query($sql)->json(),
            'hitung' => DB::terhubung()->query($sql)->hitung(),
            default => DB::terhubung()->query($sql)->hasil()
        };
    }

    protected static function getLeftJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $iselect = "";
        $no1 = 1;
        foreach ($select as $s) {
            if (count($select) == $no1) {
                $iselect .= $s;
            } else {
                $iselect .= $s . ", ";
            }
            $no1++;
        }

        $simbolbuka = "";
        if (count($join) == 1) {
            $from = $from;
        } else {
            for ($s = 1; $s <= count($join); $s++) {
                $simbolbuka .= "(";
            }
            $from = $simbolbuka . $from;
        }

        $simboltutup = "";

        if (count($join) == 1) {
            $simboltutup = "";
        } else {
            $simboltutup = ")";
        }

        $datajoin = "";
        foreach ($join as $jk => $jv) {
            foreach ($jv as $jvk => $jvv) {
                $datajoin .= " LEFT JOIN " . $jk . " ON " . $jvk . " = " . $jvv . $simboltutup;
            }
        }

        if ($orderby != "") {
            $orderby = " ORDER BY " . $orderby;
        }

        if (!$asc) {
            $asc = "DESC";
        } else {
            $asc = "";
        }

        $sql = "SELECT {$iselect} FROM {$from} {$datajoin} {$orderby} {$asc} ";

        return match ($output) {
            'json' => DB::terhubung()->query($sql)->json(),
            'hitung' => DB::terhubung()->query($sql)->hitung(),
            default => DB::terhubung()->query($sql)->hasil()
        };
    }

    protected static function getRightJoin(
        array $select = [],
        string $from = "",
        array $join = [],
        string $output = "",
        string $orderby = "",
        bool $asc = true
    ) {
        $iselect = "";
        $no1 = 1;
        foreach ($select as $s) {
            if (count($select) == $no1) {
                $iselect .= $s;
            } else {
                $iselect .= $s . ", ";
            }
            $no1++;
        }

        $simbolbuka = "";
        if (count($join) == 1) {
            $from = $from;
        } else {
            for ($s = 1; $s <= count($join); $s++) {
                $simbolbuka .= "(";
            }
            $from = $simbolbuka . $from;
        }

        $simboltutup = "";

        if (count($join) == 1) {
            $simboltutup = "";
        } else {
            $simboltutup = ")";
        }

        $datajoin = "";
        foreach ($join as $jk => $jv) {
            foreach ($jv as $jvk => $jvv) {
                $datajoin .= " RIGHT JOIN " . $jk . " ON " . $jvk . " = " . $jvv . $simboltutup;
            }
        }

        if ($orderby != "") {
            $orderby = " ORDER BY " . $orderby;
        }

        if (!$asc) {
            $asc = "DESC";
        } else {
            $asc = "";
        }

        $sql = "SELECT {$iselect} FROM {$from} {$datajoin} {$orderby} {$asc} ";

        return match ($output) {
            'json' => DB::terhubung()->query($sql)->json(),
            'hitung' => DB::terhubung()->query($sql)->hitung(),
            default => DB::terhubung()->query($sql)->hasil()
        };
    }
}
