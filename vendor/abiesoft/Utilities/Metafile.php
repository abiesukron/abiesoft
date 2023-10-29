<?php

namespace AbieSoft\Application\Utilities;

class Metafile
{
    public static function approver(string $tipe, string $namafile, string $ukuran): string
    {
        $result = "";
        $cekextention = self::cekextension($tipe);
        if ($cekextention) {
            $result = self::cekukuran($tipe, $namafile, $ukuran);
        } else {
            $result = "Tipe file {$tipe} tidak diijinkan";
        }

        return $result;
    }

    protected static function cekextension(string $tipe): bool
    {
        $result = false;
        $alltype = [];

        foreach (explode(",", Config::envReader('FILE_TYPE_IMAGE')) as $it) {
            array_push($alltype,  $it);
        }

        foreach (explode(",", Config::envReader('FILE_TYPE_MEDIA')) as $mt) {
            array_push($alltype,  $mt);
        }

        foreach (explode(",", Config::envReader('FILE_TYPE_DOKUMEN')) as $dt) {
            array_push($alltype,  $dt);
        }

        foreach ($alltype as $ft) {
            if ($tipe == $ft) {
                $result = true;
            }
        }
        return $result;
    }

    protected static function cekukuran(string $tipe, string $namafile, string $ukuran)
    {

        $result = "";
        $kategori = "";
        /*
            Mencari kategori file berdasarkan
            file tipe, apakah image, media atau dokumen
            Untuk menset file type setingannya ada di .env
        */
        foreach (explode(",", Config::envReader('FILE_TYPE_IMAGE')) as $it) {
            if ($tipe == $it) {
                $kategori = "image";
            }
        }
        foreach (explode(",", Config::envReader('FILE_TYPE_MEDIA')) as $mt) {
            if ($tipe == $mt) {
                $kategori = "media";
            }
        }
        foreach (explode(",", Config::envReader('FILE_TYPE_DOKUMEN')) as $dt) {
            if ($tipe == $dt) {
                $kategori = "dokumen";
            }
        }

        /*
            Memverifikasi ukuran yang diperbolehkan
            Berdasarkan kategori yang sudah ditentukan
            Untuk menset ukuran setingannya ada di .env
        */
        if ($kategori == "image") {
            $ukuranapprove = Config::envReader("FILE_SIZE_IMAGE");
            if ($ukuran <= $ukuranapprove) {
                $result = $kategori;
            } else {
                $result = "Ukuran file {$namafile} melebihi " . Reader::unitdata($ukuranapprove);
            }
        } else if ($kategori == "media") {
            $ukuranapprove = Config::envReader("FILE_SIZE_MEDIA");
            if ($ukuran <= $ukuranapprove) {
                $result = $kategori;
            } else {
                $result = "Ukuran file {$namafile} melebihi " . Reader::unitdata($ukuranapprove);
            }
        } else {
            $ukuranapprove = Config::envReader("FILE_SIZE_DOKUMEN");
            if ($ukuran <= $ukuranapprove) {
                $result = $kategori;
            } else {
                $result = "Ukuran file {$namafile} melebihi " . Reader::unitdata($ukuranapprove);
            }
        }

        return $result;
    }
}
