<?php

namespace AbieSoft\Application\Collection;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Generate;
use AbieSoft\Application\Utilities\Guard;
use AbieSoft\Application\Utilities\Input;
use AbieSoft\Application\Utilities\Metafile;
use AbieSoft\Application\Collection\Fillable;

trait Post
{

    public static function doPost(string $tabel = "")
    {
        $token = Input::get('__token');
        if (Guard::FormChecker($token)) {
            if ($_FILES) {
                foreach ($_FILES as $k => $v) {
                    if (isset($_FILES[$k]['tmp_name'])) {
                        if ($_FILES[$k]['tmp_name'] != "") {
                            return self::postWithFile(tabel: $tabel);
                        } else {
                            return self::postWithFileButEmpty(tabel: $tabel);
                        }
                    } else {
                        return self::postWithoutFile(tabel: $tabel);
                    }
                }
            } else {
                return self::postWithoutFile(tabel: $tabel);
            }
        } else {
            return "Token Expire";
        }
    }

    /*
        Jika dalam form tersebut
        memiliki file yang diupload
    */

    protected static function postWithFile(string $tabel = "")
    {
        $jumlah = 0;
        $gnfile = "";


        /*
            Mengextract informasi dari input bertipe file
            Lalu memverifikasi filenya sesuai ketentuan yang diijinkan
            Menggunakan fungsi Metafile approver
        */

        foreach ($_FILES as $filedata) {

            $user = new Authentication;
            $tipe = pathinfo($filedata['name'], PATHINFO_EXTENSION);
            $tempname = $filedata['tmp_name'];
            $namafile = date("d") . date("m") . date("Y") . date("H") . date("i") . date("s") . "_" . $filedata['name'];
            $meta = Metafile::approver($tipe, $filedata['name'], $filedata['size']);
            if ($meta == "image") {
                $dirupload = __DIR__ . "/../../../" . Config::envReader('PUBLIC_FOLDER') . "/assets/storage/" . $user->getID() . "/images/";
                if (!file_exists($dirupload)) {
                    mkdir($dirupload, 0777, false);
                }
                $folder = "/assets/storage/" . $user->getID() . "/images/";
                $gnfile .= $folder . date('d') . date('m') . date('Y') . date('H') . date('i') . date('s') . "_" . $filedata['name'] . ",";
                $target_file = $dirupload . $namafile;
                $simpanfile = move_uploaded_file($tempname, $target_file);
                if ($simpanfile) {
                    $jumlah++;
                }
            } else if ($meta == "media") {
                $dirupload = __DIR__ . "/../../../" . Config::envReader('PUBLIC_FOLDER') . "/assets/storage/" . $user->getID() . "/media/";
                if (!file_exists($dirupload)) {
                    mkdir($dirupload, 0777, false);
                }
                $folder = "/assets/storage/" . $user->getID() . "/media/";
                $gnfile .= $folder . date('d') . date('m') . date('Y') . date('H') . date('i') . date('s') . "_" . $filedata['name'] . ",";
                $target_file = $dirupload . $namafile;
                $simpanfile = move_uploaded_file($tempname, $target_file);
                if ($simpanfile) {
                    $jumlah++;
                }
            } else if ($meta == "dokumen") {
                $dirupload = __DIR__ . "/../../../" . Config::envReader('PUBLIC_FOLDER') . "/assets/storage/" . $user->getID() . "/dokumen/";
                if (!file_exists($dirupload)) {
                    mkdir($dirupload, 0777, false);
                }
                $folder = "/assets/storage/" . $user->getID() . "/dokumen/";
                $gnfile .= $folder . date('d') . date('m') . date('Y') . date('H') . date('i') . date('s') . "_" . $filedata['name'] . ",";
                $target_file = $dirupload . $namafile;
                $simpanfile = move_uploaded_file($tempname, $target_file);
                if ($simpanfile) {
                    $jumlah++;
                }
            } else {
                return Metafile::approver($tipe,  $filedata['name'], $filedata['size']);
            }
        }

        if (count($_FILES) == $jumlah) {


            /*
                Mendapatkan nama-nama kolom dari sebuah tabel, 
                lalu mencocokannya dengan fillable jika ada pengecualian,
                kemudian menyimpannya kembali kedalam array $akseskolomtabel
            */

            $namadatabase = Config::envReader('DBS_NAME');
            $kolom = DB::terhubung()->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
            foreach ($kolom->hasil() as $outer_key => $array) {
                foreach ($array as $inner_key => $value) {
                    if (count(Fillable::data()) > 0) {
                        foreach (Fillable::data() as $k => $fa) {
                            if ($fa == $value and Input::get($value)) {
                                $akseskolomtabel[] = $value;
                            }
                        }
                    } else {
                        if ($value != "id" and $value != "dibuat" and $value != "diupdate") {
                            $akseskolomtabel[] = $value;
                        }
                    }
                }
            }

            $datapost = array();

            foreach ($akseskolomtabel as $kolomyangdiijinkan) {
                foreach ($_POST as $input_key => $input_value) {
                    if ($kolomyangdiijinkan == $input_key) {
                        if ($input_key ==  "psw") {
                            $salt = Generate::salt();
                            $datapost[] = Generate::make($input_value, $salt);
                            $datapost[] = $salt;
                        } else {
                            $datapost[] = $input_value;
                        }
                    }
                }
            }

            /*
                Mendapatkan nama kolom dari method POST dengan mencocokan 
                nama kolom yang sudah di simpan ke array $akseskolomtabel,
                kemudian mendapatkan value dan menyimpannya ke array $datapost
                
                PENTING! 
                Jika ingin eksekusi form menggunakan model, Pemberian nama pada 
                element form harus sesuai dengan kolom pada tabel.
            */

            $jumlahstring = strlen($gnfile) - 1;
            $gnfile = substr($gnfile, 0, $jumlahstring);
            foreach (explode(",", $gnfile) as $nafile) {
                array_push($datapost, $nafile);
            }

            /*
                Mendapatkan nama tabel kembali yang diskip dengan tanda ! 
                Untuk membedakan $_POST dan $_FILES lalu menggabungkannya
                kembali ke $akseskolomtabel karena pada $datapost sudah memiliki
                value dari $_FILES yang sudah siap input
            */

            if (isset($_POST['psw'])) {
                array_push($akseskolomtabel, 'salt');
            }

            foreach (Fillable::data() as $ak) {
                if (substr($ak, 0, 1) == "!") {
                    array_push($akseskolomtabel, str_replace("!", "", $ak));
                }
            }

            array_push($akseskolomtabel, 'id');
            array_push($datapost, Generate::ID($tabel));

            $datakolom = $akseskolomtabel;
            $datavalue = $datapost;

            /*
                Mengcombain data nama kolom dan value
            */

            $dataArray = array_combine($datakolom, $datavalue);

            if (is_array($dataArray)) {
                $dataArray = $dataArray;
            } else {
                return "Array Combine Error";
            }

            /* 
                Mengecek unique data
            */

            $unique = DB::terhubung()->query("SELECT COLUMN_NAME, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
            foreach ($unique->hasil() as $uk => $uv) {
                if ($uv->COLUMN_KEY == "UNI") {
                    $cekunique = DB::terhubung()->query(" SELECT {$uv->COLUMN_NAME} FROM $tabel WHERE {$uv->COLUMN_NAME} = '" . Input::get($uv->COLUMN_NAME) . "' ")->hitung();
                    if ($cekunique) {
                        return Input::get($uv->COLUMN_NAME) . " sudah ada";
                    }
                }
            }


            /*
                Menyimpan ke database
            */

            $input = DB::terhubung()->input($tabel, $dataArray);

            if ($input) {
                return "Berhasil";
            } else {
                return "Gagal menyimpan data";
            }
        } else {
            return "Gagal mengupload data";
        }
    }


    /*
        Jika dalam form tersebut
        memiliki file yang diupload
    */

    protected static function postWithFileButEmpty(string $tabel = "")
    {
        /*
            Mendapatkan nama-nama kolom dari sebuah tabel, 
            lalu mencocokannya dengan fillable jika ada pengecualian,
            kemudian menyimpannya kembali kedalam array $akseskolomtabel
        */

        $namadatabase = Config::envReader('DBS_NAME');
        $kolom = DB::terhubung()->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
        foreach ($kolom->hasil() as $outer_key => $array) {
            foreach ($array as $inner_key => $value) {
                if (count(Fillable::data()) > 0) {
                    foreach (Fillable::data() as $k => $fa) {
                        if ($fa == $value and Input::get($value)) {
                            $akseskolomtabel[] = $value;
                        }
                    }
                } else {
                    if ($value != "id" and $value != "dibuat" and $value != "diupdate") {
                        $akseskolomtabel[] = $value;
                    }
                }
            }
        }

        $datapost = array();

        foreach ($akseskolomtabel as $kolomyangdiijinkan) {
            foreach ($_POST as $input_key => $input_value) {
                if ($kolomyangdiijinkan == $input_key) {
                    if ($input_key ==  "psw") {
                        $salt = Generate::salt();
                        $datapost[] = Generate::make($input_value, $salt);
                        $datapost[] = $salt;
                    } else {
                        $datapost[] = $input_value;
                    }
                }
            }
        }


        /*
            Mendapatkan nama tabel kembali yang diskip dengan tanda ! 
            Untuk membedakan $_POST dan $_FILES lalu menggabungkannya
            kembali ke $akseskolomtabel karena pada $datapost sudah memiliki
            value dari $_FILES yang sudah siap input
        */

        if (isset($_POST['psw'])) {
            array_push($akseskolomtabel, 'salt');
        }

        foreach (Fillable::data() as $ak) {
            if (substr($ak, 0, 1) == "!") {
                array_push($akseskolomtabel, str_replace("!", "", $ak));
                array_push($datapost, '');
            }
        }

        array_push($akseskolomtabel, 'id');
        array_push($datapost, Generate::ID($tabel));

        $datakolom = $akseskolomtabel;
        $datavalue = $datapost;

        /*
            Mengcombain data nama kolom dan value
        */

        $dataArray = array_combine($datakolom, $datavalue);

        if (is_array($dataArray)) {
            $dataArray = $dataArray;
        } else {
            return "Array Combine Error";
        }

        /* 
            Mengecek unique data
        */

        $unique = DB::terhubung()->query("SELECT COLUMN_NAME, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
        foreach ($unique->hasil() as $uk => $uv) {
            if ($uv->COLUMN_KEY == "UNI") {
                $cekunique = DB::terhubung()->query(" SELECT {$uv->COLUMN_NAME} FROM $tabel WHERE {$uv->COLUMN_NAME} = '" . Input::get($uv->COLUMN_NAME) . "' ")->hitung();
                if ($cekunique) {
                    return Input::get($uv->COLUMN_NAME) . " sudah ada";
                }
            }
        }


        /*
            Menyimpan ke database
        */

        $input = DB::terhubung()->input($tabel, $dataArray);

        if ($input) {
            return "Berhasil";
        } else {
            return "Gagal menyimpan data";
        }
    }


    /*
        Jika dalam form tersebut
        tidak memiliki file yang diupload
    */

    protected static function postWithoutFile(string $tabel = "")
    {

        /*
            Mendapatkan nama-nama kolom dari sebuah tabel, 
            lalu mencocokannya dengan fillable jika ada pengecualian,
            kemudian menyimpannya kembali kedalam array $akseskolomtabel
        */

        $akseskolomtabel = [];
        $namadatabase = Config::envReader('DBS_NAME');
        $kolom = DB::terhubung()->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
        foreach ($kolom->hasil() as $outer_key => $array) {
            foreach ($array as $inner_key => $value) {
                if (count(Fillable::data()) > 0) {
                    foreach (Fillable::data() as $k => $fa) {
                        if ($fa == $value and Input::get($value)) {
                            $akseskolomtabel[] = $value;
                        }
                    }
                } else {
                    if ($value != "id" and $value != "dibuat" and $value != "diupdate") {
                        $akseskolomtabel[] = $value;
                    }
                }
            }
        }


        /*
            Mendapatkan nama kolom dari method POST dengan mencocokan 
            nama kolom yang sudah di simpan ke array $akseskolomtabel,
            kemudian mendapatkan value dan menyimpannya ke array $datapost
            
            PENTING! 
            Jika ingin eksekusi form menggunakan model, Pemberian nama pada 
            element form harus sesuai dengan kolom pada tabel.
        */

        $datapost = [];
        foreach ($akseskolomtabel as $kolomyangdiijinkan) {
            foreach ($_POST as $input_key => $input_value) {
                if ($kolomyangdiijinkan == $input_key) {
                    if ($input_key ==  "psw") {
                        $salt = Generate::salt();
                        $datapost[] = Generate::make($input_value, $salt);
                        $datapost[] = $salt;
                    } else {
                        $datapost[] = $input_value;
                    }
                }
            }
        }

        if (isset($_POST['psw'])) {
            array_push($akseskolomtabel, 'salt');
        }

        foreach (Fillable::data() as $ak) {
            if (substr($ak, 0, 1) == "!") {
                array_push($akseskolomtabel, str_replace("!", "", $ak));
            }
        }

        array_push($akseskolomtabel, 'id');
        array_push($datapost, Generate::ID($tabel));

        $datakolom = $akseskolomtabel;
        $datavalue = $datapost;

        /*
            Mengcombain data nama kolom dan value
        */

        $dataArray = array_combine($datakolom, $datavalue);

        if (is_array($dataArray)) {
            $dataArray = $dataArray;
        } else {
            return "Cancel";
        }


        /* 
            Mengecek unique data
        */

        $unique = DB::terhubung()->query("SELECT COLUMN_NAME, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$namadatabase}' AND TABLE_NAME = '{$tabel}' ");
        foreach ($unique->hasil() as $uk => $uv) {
            if ($uv->COLUMN_KEY == "UNI") {
                $cekunique = DB::terhubung()->query(" SELECT {$uv->COLUMN_NAME} FROM $tabel WHERE {$uv->COLUMN_NAME} = '" . Input::get($uv->COLUMN_NAME) . "' ")->hitung();
                if ($cekunique) {
                    return Input::get($uv->COLUMN_NAME) . " sudah ada";
                }
            }
        }


        /*
            Menyimpan ke database
        */

        $input = DB::terhubung()->input($tabel, $dataArray);
        if ($input) {
            return "Berhasil";
        } else {
            return "Cancel";
        }
    }
}
