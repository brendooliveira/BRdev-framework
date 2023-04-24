<?php

use App\Support\Env;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

Env::load(__DIR__ . '/../../.env');

define("DATA_LAYER_CONFIG", [
    "driver"    =>  $_ENV["CONF_DB_DRIVER"],
    "host"      =>  $_ENV["CONF_DB_HOST"],
    "port"      =>  $_ENV["CONF_DB_PORT"],
    "dbname"    =>  $_ENV["CONF_DB_NAME"],
    "username"  =>  $_ENV["CONF_DB_USER"],
    "passwd"    =>  $_ENV["CONF_DB_PSWD"],
    "options"   => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
