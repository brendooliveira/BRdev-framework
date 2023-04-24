<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    /**
     * User constructor.
    */
    public function __construct()
    {
        parent::__construct("users", ["first_name", "last_name"]);
    }
    
}