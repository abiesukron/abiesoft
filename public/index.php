<?php

session_start();
date_default_timezone_set("Asia/Bangkok");

include_once __DIR__.'/../vendor/autoload.php';

use AbieSoft\Application\LoadSys;

$app = new LoadSys;
$app->start();