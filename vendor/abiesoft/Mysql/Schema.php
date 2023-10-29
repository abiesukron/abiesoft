<?php

namespace AbieSoft\Application\Mysql;

class Schema
{

    private array $schema = [];

    protected function teks(string $nama, int $panjang = 255, string $default = "", string $key = "", bool $unique = false)
    {

        if ($default == "") {
            $default = "DEFAULT NULL";
        } else {
            if ($default == "NOT NULL") {
                $default = " DEFAULT NOT NULL";
            } else {
                $default = " DEFAULT '" . $default . "'";
            }
        }

        if ($unique) {
            $unique = " UNIQUE";
        }

        return $this->schema[$nama] =  $nama .  " VARCHAR(" . $panjang . ") " . $default .  $key . $unique;
    }

    protected function paragrap(string $nama)
    {
        return $this->schema[$nama] = $nama .  " TEXT ";
    }

    protected function tanggal(string $nama)
    {
        return $this->schema[$nama] = $nama .  " DATETIME ";
    }


    protected function number(string $nama, int $panjang = 11, int $default = 0, string $key = "", bool $unique = false)
    {
        if ($default != 0) {
            $default = "DEFAULT " . $default;
        } else {
            $default = " DEFAULT " . 0;
        }

        if ($unique) {
            $unique = " UNIQUE";
        }

        return $this->schema[$nama] = $nama .  " INT(" . $panjang . ") "  . $default . $key . $unique;
    }

    protected function create(string $tabel)
    {
        $generateSchema = "";
        foreach ($this->schema as $schema) {
            $generateSchema .= $schema . ", ";
        }

        $sql = "CREATE TABLE " . $tabel . " (
            id VARCHAR(12) UNIQUE PRIMARY KEY,
            " . $generateSchema . "
            dibuat DATETIME DEFAULT CURRENT_TIMESTAMP,
            diupdate DATETIME NULL
        )";

        return $sql;
    }
}
