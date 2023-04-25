<?php

use Database\Tables\User;

require __DIR__."/../vendor/autoload.php";

//EXEC CLASS
(new User($_ENV["CONF_DB_NAME"]))->exec();