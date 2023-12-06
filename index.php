<?php

use BRdev\Router\Router;
require __DIR__."/vendor/autoload.php";

Router::namespace("App\Controller");

Router::get("/","Web@home");

Router::get("/error/{code}",function ($data) {
    dd($data);
});

Router::dispatch();

if(Router::getError()){
    Router::redirect("/error/".Router::getError());
}