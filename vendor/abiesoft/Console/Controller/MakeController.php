<?php

namespace AbieSoft\Application\Console\Controller;

class MakeController
{

    public static function run(string $nama)
    {
        $dir = __DIR__ . "/../../../../controllers";
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
        $file = fopen($dir . "/" . $nama . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Controllers;\n\n";
        fwrite($file, $isi);
        $isi = "use AbieSoft\Application\Http\Controller;\n\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Controller\n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function index()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->view('" . strtolower(explode("Controller", $nama)[0]) . "/index', [\n";
        fwrite($file, $isi);
        $isi = "            'title' => '" . explode("Controller", $nama)[0] . "',\n";
        fwrite($file, $isi);
        $isi = "        ]);\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function table()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            Defaultnya function ini digunakan untuk meload data tabel\n";
        fwrite($file, $isi);
        $isi = "            yang digunakan untuk function index\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function add()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Halaman tambah */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function edit($" . "" . "id)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Halaman edit */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function read($" . "" . "id)\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Halaman detail */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function keep()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Tambah data, methodnya post */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function update()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Edit data, methodnya patch */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function delete()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /* Hapus data, methodnya delete */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "}";
        fwrite($file, $isi);
        fclose($file);
        echo "\n\e[0;102m Sukses! \e[0m\n\e[0;36mLokasi:\e[0m controllers/" . $nama . ".php \n\n";
    }
}
