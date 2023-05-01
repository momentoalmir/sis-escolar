<?php

namespace Utils;

class Database
{
    public function __construct($host, $port, $database, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnection()
    {
        $host = $this->host;
        $port = $this->port;
        $database = $this->database;
        $username = $this->username;
        $password = $this->password;

        $connection = new \PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

    public function migrate()
    {
        $connection = $this->getConnection();

        $sql = "CREATE DATABASE IF NOT EXISTS sis_escolar;
        USE sis_escolar;
        CREATE TABLE IF NOT EXISTS tb_turmas (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            descTurma VARCHAR(20) NOT NULL,
            ano VARCHAR(4) NOT NULL
        );";

        $connection->exec($sql);
    }

    public function insert($table, $data)
    {
        $connection = $this->getConnection();

        $columns = implode(', ', array_keys($data));
        $values = implode("', '", $data);

        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

        $connection->exec($sql);
    }

    public function select($table, $columns = ['*'], $where = [], $limit = null)
    {
        $connection = $this->getConnection();

        $columns = implode(', ', $columns);

        $whereSql = '';
        if (count($where) > 0) {
            $whereSql = 'WHERE ';
            foreach ($where as $key => $value) {
                $whereSql .= "$key = '$value' AND ";
            }
            $whereSql = substr($whereSql, 0, -5);
        }

        $sql = "SELECT $columns FROM $table $whereSql";

        if ($limit) {
            $sql .= " LIMIT $limit";
        }

        $statement = $connection->query($sql);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($table, $where = [])
    {
        $limit = 1;
        $result = $this->select($table, ['*'], $where, $limit);
        return $result[0];
    }

    public function update($table, $data, $where = [])
    {
        $connection = $this->getConnection();

        $setSql = '';
        foreach ($data as $key => $value) {
            $setSql .= "$key = '$value', ";
        }
        $setSql = substr($setSql, 0, -2);

        $whereSql = '';
        foreach ($where as $key => $value) {
            $whereSql .= "$key = '$value' AND ";
        }
        $whereSql = substr($whereSql, 0, -5);

        $sql = "UPDATE $table SET $setSql WHERE $whereSql";

        $connection->exec($sql);
    }

    public function delete($table, $where = [])
    {
        $connection = $this->getConnection();

        $whereSql = '';
        foreach ($where as $key => $value) {
            $whereSql .= "$key = '$value' AND ";
        }
        $whereSql = substr($whereSql, 0, -5);

        $sql = "DELETE FROM $table WHERE $whereSql";

        $connection->exec($sql);
    }

    public static function getDatabase()
    {
        $db = new Database(DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        return $db;
    }
}
