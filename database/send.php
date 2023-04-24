<?php

require __DIR__."/../vendor/autoload.php";

$host = $_ENV["CONF_DB_HOST"];
$username = $_ENV["CONF_DB_USER"];
$password = $_ENV["CONF_DB_PSWD"];
$newDatabaseName = $_ENV["CONF_DB_NAME"];
$filePath = __DIR__."/db.sql";

try {
    $uploader = new Database($host, $username, $password);
    $uploader->upload($newDatabaseName, $filePath);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
