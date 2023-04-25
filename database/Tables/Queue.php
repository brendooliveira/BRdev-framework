<?php

namespace Database\Tables;

use App\Support\Database;

class User extends Database
{

    public function __construct()
    {
        parent::__construct(envget("CONF_DB_NAME"));
    }

    public function created()
    {
        $tableName = 'mail_queue';
        $columns = [
            "id"                =>  "int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL",
            "subject"           =>  "varchar(255) NOT NULL DEFAULT ''",
            "body"              =>  "text NOT NULL",
            "from_email"        =>  "varchar(255) NOT NULL DEFAULT ''",
            "from_name"         =>  "varchar(255) NOT NULL DEFAULT ''",
            "recipient_email"   =>  "varchar(255) NOT NULL DEFAULT ''",
            "recipient_name"    =>  "varchar(255) NOT NULL DEFAULT ''",
            "sent_at"           =>  "timestamp NULL DEFAULT NULL",
            "status"            =>  "varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed'",
            "created_at"        =>  "timestamp NOT NULL DEFAULT current_timestamp()",
            "updated_at"        =>  "timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()"
        ];

        parent::createTable($this->dbName, $tableName, $columns);
    }

    public function exec()
    {
        $this->created();
    }
}
