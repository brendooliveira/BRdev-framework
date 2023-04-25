<?php

use Database\Tables\User;

require __DIR__."/../vendor/autoload.php";

$pdo = new PDO($_ENV["CONF_DB_DRIVER"].':host='.$_ENV["CONF_DB_HOST"], $_ENV["CONF_DB_USER"], $_ENV["CONF_DB_PSWD"]);


//EXEC CLASS
(new User($pdo, $_ENV["CONF_DB_NAME"]))->exec();