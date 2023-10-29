<?php

namespace AbieSoft\Application\Console\Template;

use AbieSoft\Application\Utilities\Config;

class MakeTemplate
{
    public static function run(string $folder, string $nama)
    {

        $dir = __DIR__ . "/../../../../templates/page/" . $folder;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, false);
        }

        self::makeSure($dir, $nama);
        self::releaseFile($dir, $nama);
    }

    protected static function makeSure(string $dir, string $nama): void
    {
        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n\e[0;101m Hati-hati! \e[0m\nFile " . $nama . ".php sudah ada. Ingin menimpanya?\e[0m\n";
            echo "Ketik [\e[0;32mYa\e[0m] untuk menimpah file\e[0m\n";
            echo "Tekan [\e[0;32mEnter\e[0m] untuk membatalkan\e[0m\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                self::releaseFile($dir, $nama);
                die();
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        }
    }

    protected static function releaseFile(string $dir, string $nama): void
    {
        $folder = explode("/../../../../", $dir)[1];
        $page =  explode("/page/",$dir)[1];

        $file = fopen($dir . "/" . $nama . ".latte", 'w') or die("Tidak Dapat Membuka File");
        $isi = "{layout '../../main.latte'}\n";
        fwrite($file, $isi);
        $isi = "{block title}{" . "$" . "title}{/block}\n";
        fwrite($file, $isi);
        $isi = "{block css}{/block}\n";
        fwrite($file, $isi);
        $isi = "{block content}\n";
        fwrite($file, $isi);


        $isi = "<div class='page'>\n";
        fwrite($file, $isi);
        $isi = "    <div class='card'>\n\n";
        fwrite($file, $isi);
        $isi = "        <!-- Card Header -->\n";
        fwrite($file, $isi);
        $isi = "        <div class='card-header'>\n";
        fwrite($file, $isi);
        $isi = "            <button id='back'><i class='las la-angle-left'></i></button>\n";
        fwrite($file, $isi);
        $isi = "            <div class='label'>{"."$".""."title}</div>\n";
        fwrite($file, $isi);
        $isi = "            <button class='card-option-btn' data-model='buttonopsi'><i class='las la-ellipsis-v' data-model='buttonopsi'></i></button>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n";
        fwrite($file, $isi);
        $isi = "        <div class='card-opsi'>\n";
        fwrite($file, $isi);
        $isi = "            <button onClick='window.location.href=this.dataset.url' data-url='{"."$".""."url}/'><i class='las la-pen'></i> <span>Edit</span></button>\n";
        fwrite($file, $isi);
        $isi = "            <form method='post' id='formHapus' name='formHapus' onSubmit='return hapus()'>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='__info' name='__info' value=''>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='__token' name='__token' value='{"."$".""."csrf}'>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='__url' name='__url' value='{"."$".""."url}'>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='id' name='id' value='{"."$".""."id}'>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='__tb' name='__tb' value=''>\n";
        fwrite($file, $isi);
        $isi = "                <input type='hidden' id='__method' name='__method' value='DELETE'>\n";
        fwrite($file, $isi);
        $isi = "                <button><i class='las la-trash'></i> <span>Hapus</span></button>\n";
        fwrite($file, $isi);
        $isi = "            </form>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n\n";
        fwrite($file, $isi);
        $isi = "        <!-- Card Body -->\n";
        fwrite($file, $isi);
        $isi = "        <div class='card-body'>\n";
        fwrite($file, $isi);
        $isi = "            <div class='empty'>\n";
        fwrite($file, $isi);
        $isi = "                <div>\n";
        fwrite($file, $isi);
        $isi = "                    <img src='{"."$".""."url}/assets/img/banner.png'>\n";
        fwrite($file, $isi);
        $isi = "                    <label>Page ".ucfirst($page)."</label>\n";
        fwrite($file, $isi);
        $isi = "                    <div><small>Ini tampilan default dari page ".$page."</small></div>\n";
        fwrite($file, $isi);
        $isi = "                </div>\n";
        fwrite($file, $isi);
        $isi = "            </div>\n";
        fwrite($file, $isi);
        $isi = "        </div>\n\n";
        fwrite($file, $isi);
        $isi = "    </div>\n";
        fwrite($file, $isi);
        $isi = "</div>\n";
        fwrite($file, $isi);



        $isi = "{/block}\n";
        fwrite($file, $isi);
        $isi = "{block js}{/block}\n";
        fwrite($file, $isi);
        fclose($file);

        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi:\e[0m " . $folder . "/" . $nama . ".latte \n\n";
    }
}
