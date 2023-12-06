<?php

use BRdev\Router\Router;
require __DIR__."/vendor/autoload.php";

Router::namespace("App\Controller");

Router::get("/","Web@home");
Router::post("/send","Web@contact");

Router::get("/error/{code}",function ($data) {
    echo url();
});

Router::dispatch();

if(Router::getError()){
    Router::redirect("/error/".Router::getError());
}