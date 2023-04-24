<?php

use BRdev\Router\Router;
require __DIR__."/vendor/autoload.php";

Router::namespace("App\Controller");

Router::get("/","Web@home");

Router::get("/error/{code}",function ($data) {
    return view("web.error", ["code" => $data["code"]]);
});

Router::dispatch();

if(Router::getError()){
    Router::redirect("/error/".Router::getError());
}