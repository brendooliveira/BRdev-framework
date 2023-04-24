<?php

namespace App\Support;

use Exception;
use mysqli;

class Database
{

    private $host;
    private $username;
    private $password;

    public function __construct($host, $username, $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function upload($newDatabaseName, $filePath)
    {
        // Verifique se o arquivo existe
        if (!file_exists($filePath)) {
            throw new Exception("Arquivo não encontrado: $filePath");
        }

        // Conectar ao servidor de banco de dados
        $connection = new mysqli($this->host, $this->username, $this->password);

        // Verifique a conexão
        if ($connection->connect_error) {
            throw new Exception("Conexão falhou: " . $connection->connect_error);
        }

        // Criar novo banco de dados
        $createDbQuery = "CREATE DATABASE IF NOT EXISTS `$newDatabaseName`";
        if ($connection->query($createDbQuery) !== TRUE) {
            throw new Exception("Erro ao criar banco de dados: " . $connection->error);
        }

        // Selecionar o novo banco de dados
        $connection->select_db($newDatabaseName);

        // Ler o conteúdo do arquivo SQL
        $sqlContent = file_get_contents($filePath);

        // Executar multiplas consultas SQL
        if ($connection->multi_query($sqlContent) === TRUE) {
            while ($connection->next_result()) {;
            } // Libera resultados extras
            echo "Banco de dados criado e populado com sucesso!";
        } else {
            throw new Exception("Erro ao importar arquivo SQL: " . $connection->error);
        }

        // Fechar conexão
        $connection->close();
    }
}
