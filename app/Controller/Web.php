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
            envget("CONF_TITLE") . " | HOME",
            envget("CONF_SUBTITLE"),
            url("/"),
            "img"
        )->render();

        view('web.welcome', [
            "head" => $head
        ]);
    }

}
