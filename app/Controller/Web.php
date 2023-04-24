<?php

namespace App\Controller;

use App\Core\Controller;
use App\Models\User;

class Web extends Controller
{

    public function __construct()
    {
        
        parent::__construct();
    }

    public function home()
    {
        $head = $this->seo->optimize(
            $_ENV["CONF_TITLE"] . " | HOME",
            $_ENV["CONF_SUBTITLE"],
            url("/"),
            "img"
        )->render();

        view('web.welcome', [
            "head" => $head
        ]);
    }

    public function error($data)
    {
        $head = $this->seo->optimize(
            $_ENV["CONF_TITLE"] . " | ERROR",
            $_ENV["CONF_SUBTITLE"],
            url("/error/" . $data["code"]),
            "img"
        )->render();

        view('web.error', [
            "head" => $head,
            "code" => $data["code"]
        ]);
    }
}
