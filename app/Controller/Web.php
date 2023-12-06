<?php

namespace App\Controller;

use App\Core\Controller;

class Web extends Controller
{

    public function __construct()
    {
        
        parent::__construct();
    }

    public function home(): void
    {
        $head = $this->seo->optimize(
            envget("CONF_TITLE"),
            envget("CONF_SUBTITLE"),
            url("/"),
            assets("img/shared.png")
        )->render();

        view('web.home', [
            "head" => $head
        ]);
    }
}
