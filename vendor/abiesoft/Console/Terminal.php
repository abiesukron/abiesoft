<?php 

namespace AbieSoft\Application\Console;

use AbieSoft\Application\Console\Controller\DeleteController;
use AbieSoft\Application\Console\Controller\MakeController;
use AbieSoft\Application\Console\Database\Backup;
use AbieSoft\Application\Console\Database\Import;
use AbieSoft\Application\Console\Database\Refresh;
use AbieSoft\Application\Console\Database\Restore;
use AbieSoft\Application\Console\Model\DeleteModel;
use AbieSoft\Application\Console\Model\MakeModel;
use AbieSoft\Application\Console\Schema\DeleteSchema;
use AbieSoft\Application\Console\Schema\MakeSchema;
use AbieSoft\Application\Console\Template\DeleteTemplate;
use AbieSoft\Application\Console\Template\MakeTemplate;
use AbieSoft\Application\Http\Route;
use AbieSoft\Application\Utilities\Config;

class Terminal
{

    public function __construct($command)
    {
        unset($command[0]);

        $page = "";
        $model = "";

        if(isset($command[1])){
            if(count(explode(":",$command[1])) > 1){
                $model = strtolower(explode(":",$command[1])[1]);
                if(
                    $model == "controller"
                    || $model == "model"
                    || $model == "schema"
                    || $model == "template"
                    || $model == "import"
                    || $model == "restore"
                    || $model == "backup"
                    || $model == "refresh"
                ) {
                    $page = explode(":",$command[1])[0];
                    $model = strtolower(explode(":",$command[1])[1]);
                }else{
                    $page = "";
                    $model = "";
                }
            }else{
                $page = $command[1];
            }
        }

        
        return match ($page) {
            'start' => $this->start($command),
            'version' => $this->version(),
            '-v' => $this->version(),
            'make' => $this->$model($page, $command),
            'delete' => $this->$model($page, $command),
            'db' => $this->db($model),
            'info' => $this->info($command),
            default => $this->help(),
        };

    }

    protected function controller($page, $command) 
    {
        unset($command[1]);
        $fc = "";
        $nama = "";
        if(isset($command[2])){
            $fc = $page;
            $nama = $command[2];
        }

        return match($fc) 
        {
            'make' => MakeController::run($nama),
            'delete' => DeleteController::run($nama),
            default => $this->help(),
        };
    }

    protected function model($page, $command) 
    {
        unset($command[1]);
        $fc = "";
        $nama = "";
        if(isset($command[2])){
            $fc = $page;
            $nama = $command[2];
        }

        return match($fc) 
        {
            'make' => MakeModel::run($nama),
            'delete' => DeleteModel::run($nama),
            default => $this->help(),
        };
    }

    protected function schema($page, $command) 
    {
        unset($command[1]);
        $fc = "";
        $nama = "";
        if(isset($command[2])){
            $fc = $page;
            $nama = $command[2];
        }

        return match($fc) 
        {
            'make' => MakeSchema::run($nama),
            'delete' => DeleteSchema::run($nama),
            default => $this->help(),
        };
    }

    protected function template($page, $command) 
    {
        unset($command[1]);
        $fc = "";
        $nama = "";
        $folder = "";
        if(isset($command[2])){
            $fc = $page;
            if(count(explode("/",$command[2])) > 1){
                $nama = explode("/",$command[2])[count(explode("/",$command[2])) - 1];
                $folder = str_replace("/".$nama, "",$command[2]);   
            }
        }

        return match($fc) 
        {
            'make' => MakeTemplate::run($folder,$nama),
            'delete' => DeleteTemplate::run($folder,$nama),
            default => $this->help(),
        };
    }

    protected function db($model) 
    {
        return match($model) 
        {
            'import' => Import::run(),
            'backup' => Backup::run(),
            'restore' => Restore::run(),
            'refresh' => Refresh::run(),
            default => $this->help(),
        };
    }

    protected function start($command) 
    {
        unset($command[1]);
        $dir = __DIR__ . "/../../../".Config::envReader('PUBLIC_FOLDER');
        chdir($dir);
        $output = null;
        $result = null;
        exec("php -S " . Config::envReader('WEB_DOMAIN'), $output, $result);
    }

    protected function info($command)
    {
        unset($command[1]);
        
        $what = "";
        if(isset($command[2])){
            $what = $command[2];
        }

        return match($what) {
            'route' => $this->route(), 
            default => $this->version()
        };
    }

    protected function route()
    {
        echo "\n";
        echo "\n\e[0;102m Daftar Route \e[0m\n";
        $tabel = "%-5.5s %-100.100s  %7.7s \n";
        printf($tabel, 'No', 'Route', 'Method');
        $no = 1;
        foreach (Route::getRoute() as $k => $v) {
            foreach ($v as $kv => $vv) {
                printf($tabel, $no . ". ", $kv . "  --------------------------------------------------------------------------------------------------------------------------", strtoupper($k));
                $no++;
            }
        }
        echo "\n";
        // print_r(Route::getRoute());
    }

    protected function version()
    {
        echo "\nAbieSoft \e[0;102m Version \e[0m\e[0;106m " . Config::envReader('VERSION') . " \e[0m\n\n";
    }

    protected function help() 
    {
        echo "\n\n\e[0;102mHelp! \e[0m\n";
        echo "\e[0;36mAplikasi:\e[0m \n";
        echo "\e[0m     start \n";
        echo "\e[0m     version \n";
        echo "\e[0m     info route \n";
        echo "\e[0m     generate api \n";
        echo "\e[0;36mDatabase:\e[0m \n";
        echo "\e[0m     db:import \n";
        echo "\e[0m     db:refresh \n";
        echo "\e[0m     db:backup \n";
        echo "\e[0m     db:restore \n";
        echo "\e[0;36mSchema Database:\e[0m \n";
        echo "\e[0m     make:schema [nama] \n";
        echo "\e[0m     delete:schema [nama] \n";
        echo "\e[0;36mController:\e[0m \n";
        echo "\e[0m     make:controller [NamaController] \n";
        echo "\e[0m     delete:controller [NamaController] \n";
        echo "\e[0;36mModel:\e[0m \n";
        echo "\e[0m     make:model [Nama] \n";
        echo "\e[0m     delete:model [Nama] \n";
        echo "\e[0;36mTemplate:\e[0m \n";
        echo "\e[0m     make:template [Nama Folder]/[Nama File] \n";
        echo "\e[0m     delete:template [Nama Folder]/[Nama File] \n";
        echo "\n";
    }

}