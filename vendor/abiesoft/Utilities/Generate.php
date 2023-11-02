<?php

namespace AbieSoft\Application\Utilities;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Reader;

class Generate
{

    protected static $token = null;

    protected static function createToken($token): string
    {
        $isGenerate =  false;
        $ip = Reader::ip();
        $cektoken = DB::terhubung()->query("SELECT * FROM token WHERE ip = '" . $ip . "' ");
        $newToken = $token;
        if ($cektoken->hitung() != 0) {
            foreach ($cektoken->hasil() as $token) {
                DB::terhubung()->perbarui('token', $token->id, [
                    'token' => $newToken,
                    'ip' => $ip
                ]);
            }
            $isGenerate =  true;
        } else {
            DB::terhubung()->input('token', [
                'id' => Generate::ID('token'),
                'token' => $newToken,
                'ip' => $ip
            ]);
            $isGenerate =  true;
        }
        return $isGenerate;
    }

    public static function csrf(): string
    {
        $token = substr(sha1(date('Y-m-d H:i:s')), 10, 9);
        self::createToken($token);
        return $token;
    }

    public static function ID(string $tabel): string
    {
        $result = self::acak();
        $cekID = DB::terhubung()->query("SELECT * FROM {$tabel} WHERE id = '" . $result . "' ");
        if ($cekID->hitung()) {
            return self::ID($tabel);
        } else {
            return $result;
        }
    }

    public static function Username(string $inisial): string
    {
        $result = self::acak();
        $cekUsername = DB::terhubung()->query("SELECT * FROM users WHERE username = '".$inisial."-" . $result . "' ");
        if ($cekUsername->hitung()) {
            return self::Username($inisial);
        } else {
            return $inisial.'-'.$result;
        }
    }

    protected static function acak()
    {
        $karakter = 'AaBbCcDdEeFfGgHhIiJjKkLMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function kode($jumlah) : int
    {
        
        if($jumlah == ""){
            $jl = 4;
        }else{
            $jl = $jumlah;
        }

        $karakter = '0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < $jl; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        
        return $result;
    }

    public static function salt(): string
    {
        $charset = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!~^@#$%^&*";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -20);
    }

    public static function make(string $string, string $salt): string
    {
        return hash('sha256', $string . $salt);
    }
}
