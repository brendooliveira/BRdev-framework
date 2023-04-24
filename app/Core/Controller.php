<?php

namespace App\Core;

use BRdev\Sessions\Session;
use CoffeeCode\Optimizer\Optimizer;

class Controller 
{
    public $seo;
    public $session;

    public function __construct()
    {
        $this->seo = new Optimizer();
        $this->session = new Session(__DIR__."/../Support/sessions");
    }
}