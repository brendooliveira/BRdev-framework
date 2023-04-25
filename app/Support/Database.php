<?php

namespace App\Support;

use PDO;
use PDOException;

class Database {
    private $pdo;
    protected $dbName;

    public function __construct(PDO $pdo, string $dbName) {
        $this->pdo = $pdo;
        $this->dbName = $dbName;
    }

    public function createDatabase(string $dbName) {
        $sql = "CREATE DATABASE IF NOT EXISTS `$dbName`";

        try {
            $this->pdo->exec($sql);
            echo "Banco de dados '$dbName' criado com sucesso.\n";
        } catch (PDOException $e) {
            echo "Erro ao criar o banco de dados '$dbName': " . $e->getMessage() . "\n";
        }
    }

    public function databaseExists(string $dbName): bool {
        $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbName";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':dbName' => $dbName]);

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            echo "Erro ao verificar a existência do banco de dados '$dbName': " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function tableExists(string $dbName, string $tableName): bool {
        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :dbName AND TABLE_NAME = :tableName";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':dbName' => $dbName, ':tableName' => $tableName]);

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            echo "Erro ao verificar a existência da tabela '$tableName' no banco de dados '$dbName': " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function createTable(string $dbName, string $tableName, array $columns) {
        if (!$this->databaseExists($dbName)) {
            $this->createDatabase($dbName);
        }

        if ($this->tableExists($dbName, $tableName)) {
            echo "A tabela '$tableName' já existe no banco de dados '$dbName'.\n";
            return;
        }

        $columnDefinitions = [];

        foreach ($columns as $column => $dataType) {
            $columnDefinitions[] = "`$column` $dataType";
        }

        $columnDefinitionsString = implode(", ", $columnDefinitions);
        $sql = "CREATE TABLE IF NOT EXISTS `$dbName`.`$tableName` ($columnDefinitionsString)";

        try {
            $this->pdo->exec($sql);
            echo "Tabela '$tableName' criada com sucesso no banco de dados '$dbName'.\n";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela '$tableName' no banco de dados '$dbName': " . $e->getMessage() . "\n";
        }
    }

    public function insertValues(string $dbName, string $tableName, array $data) {
        if (!$this->tableExists($dbName, $tableName)) {
            echo "A tabela '$tableName' não existe no banco de dados '$dbName'.\n";
            return;
        }

        $columnNames = array_keys($data);
        $columnPlaceholders = array_map(function ($column) {
            return ":$column";
        }, $columnNames);

        $columnsString = implode(', ', $columnNames);
        $placeholdersString = implode(', ', $columnPlaceholders);

        $sql = "INSERT INTO `$dbName`.`$tableName` ($columnsString) VALUES ($placeholdersString)";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            echo "Valores inseridos com sucesso na tabela '$tableName' no banco de dados '$dbName'.\n";
        } catch (PDOException $e) {
            echo "Erro ao inserir valores na tabela '$tableName' no banco de dados '$dbName': " . $e->getMessage() . "\n";
        }
    }
}

