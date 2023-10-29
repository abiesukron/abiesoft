<?php

namespace AbieSoft\Application\Utilities;

class Tanggal
{
    
    public static function hariini () {

        $hari = self::formatHari(date('N'));
        $tanggal = date('d');
        $bulan = date('F');
        $tahun = date('Y');

        // Senin, 1 Januari 2001
        return $hari . ", ". $tanggal." ".self::indoFormat($bulan)." ".$tahun;

    }






    /*
        Konverter
    */

    protected static function formatHari ($hari) {
        return match ($hari) {
            "1" => "Senin",
            "2" => "Selasa",
            "3" => "Rabu",
            "4" => "Kamis",
            "5" => "Jum'at",
            "6" => "Sabtu",
            default => "Minggu"
        };
    }

    protected static function indoFormat ($bulan) {
        return match ($bulan) {
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Januari',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            default => 'Desember'
        };
    }

}