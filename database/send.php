<?php

use Database\Tables\Queue;
use Database\Tables\User;

require __DIR__."/../vendor/autoload.php";

//EXEC CLASS
(new User())->exec();
(new Queue())->exec();