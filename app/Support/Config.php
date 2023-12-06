<?php
 
use App\Support\Env;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

// has .env else copy .env.exemple
if (!file_exists(__DIR__ . '/../../.env')) {
    copy(__DIR__ . '/../../.env.exemple', __DIR__ . '/../../.env');
}

$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

Env::load(__DIR__ . '/../../.env');

define("DATA_LAYER_CONFIG", [
   'driver' => $_ENV["CONF_DB_DRIVER"],
   'host' => $_ENV["CONF_DB_HOST"],
   'port' => $_ENV["CONF_DB_PORT"],
   'dbname' => $_ENV["CONF_DB_NAME"],
   'username' => $_ENV["CONF_DB_USER"],
   'passwd' => $_ENV["CONF_DB_PSWD"],
   'options' => [   
       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
       PDO::ATTR_CASE => PDO::CASE_NATURAL
   ]
   
]);

define("CONF_MAIL_HOST", $_ENV["CONF_MAIL_HOST"]);
define("CONF_MAIL_PORT", $_ENV["CONF_MAIL_PORT"]);
define("CONF_MAIL_USER", $_ENV["CONF_MAIL_USER"]);
define("CONF_MAIL_PASS", $_ENV["CONF_MAIL_PASS"]);
define("CONF_MAIL_SENDER", ['name' => $_ENV["CONF_MAIL_SENDER_NAME"], 'address' => $_ENV["CONF_MAIL_SENDER_ADDRESS"]]);
define("CONF_MAIL_SUPPORT", $_ENV["CONF_MAIL_PASS"]);
define("CONF_MAIL_OPTION_LANG", $_ENV["CONF_MAIL_OPTION_LANG"]);
define("CONF_MAIL_OPTION_HTML", $_ENV["CONF_MAIL_OPTION_HTML"]);
define("CONF_MAIL_OPTION_AUTH", $_ENV["CONF_MAIL_OPTION_AUTH"]);
define("CONF_MAIL_OPTION_SECURE", $_ENV["CONF_MAIL_OPTION_SECURE"]);
define("CONF_MAIL_OPTION_CHARSET", $_ENV["CONF_MAIL_OPTION_CHARSET"]);

define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "public/storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);
