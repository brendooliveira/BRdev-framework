<?php

namespace Database\Tables;

use App\Support\Database;
use PDO;

class User extends Database
{

    public function __construct()
    {
        parent::__construct($_ENV["CONF_DB_NAME"]);
    }

    public function created()
    {
        $tableName = 'users';
        $columns = [
            "id"            =>  "int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL",
            "first_name"    =>  "varchar(255) NOT NULL DEFAULT ''",
            "last_name"     =>  "varchar(255) NOT NULL DEFAULT ''",
            "email"         =>  "varchar(255) NOT NULL UNIQUE",
            "password"      =>  "varchar(255) NOT NULL DEFAULT ''",
            "level"         =>  "int(11) NOT NULL DEFAULT 1",
            "forget"        =>  "varchar(255) DEFAULT NULL",
            "genre"         =>  "varchar(10) DEFAULT NULL",
            "datebirth"     =>  "date DEFAULT NULL",
            "document"      =>  "varchar(11) DEFAULT NULL",
            "photo"         =>  "varchar(255) DEFAULT NULL",
            "status"        =>  "varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed'",
            "created_at"    =>  "timestamp NOT NULL DEFAULT current_timestamp()",
            "updated_at"    =>  "timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()"
        ];

        parent::createTable($this->dbName, $tableName, $columns);
    }

    public function exec()
    {
        $this->created();
        $tableName = 'users';


        $values = [
            'first_name' => 'João',
            'last_name' => 'Silva',
            'email' => 'joao.silva@email.com',
            'password' => password_hash('senha123', PASSWORD_DEFAULT),
        ];


        parent::insertValues($this->dbName, $tableName, $values);
    }
}
