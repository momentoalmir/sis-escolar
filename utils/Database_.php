<?php

namespace Utils;


class Database
{
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;

    private $options = [
        'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'sis_escolar',
            'username' => 'root',
            'password' => ''
        ],
        'baseURL' => ''
    ];

    public function __construct()
    {
        $this->host = $this->options['database']['host'];
        $this->port = $this->options['database']['port'];
        $this->database = $this->options['database']['database'];
        $this->username = $this->options['database']['username'];
        $this->password = $this->options['database']['password'];
    }

    public function getConnection()
    {
        $connection = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->username, $this->password);
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
        );

        CREATE TABLE IF NOT EXISTS tb_disciplinas (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            descDisciplina VARCHAR(20) NOT NULL,
            idTurma INT NOT NULL,
            FOREIGN KEY (idTurma) REFERENCES tb_turmas(id)
        );";

        $connection->exec($sql);
    }

    protected function _insert($table, $data)
    {
        $connection = $this->getConnection();

        $columns = implode(', ', array_keys($data));
        $values = implode("', '", $data);

        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

        $connection->exec($sql);
    }

    protected function _select($table, $columns = ['*'], $where = [], $limit = null)
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

    protected function _get($table, $where = [])
    {
        $limit = 1;
        $result = $this->_select($table, ['*'], $where, $limit);
        return $result[0];
    }

    protected function _update($table, $data, $where = [])
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

    protected function _delete($table, $where = [])
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

    protected function _hasMany($table, $foreignKey, $foreignId)
    {
        $connection = $this->getConnection();

        $sql = "SELECT * FROM $table WHERE $foreignKey = $foreignId";

        $statement = $connection->query($sql);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function _belongsTo($table, $foreignKey)
    {
        $connection = $this->getConnection();

        $sql = "SELECT * FROM $table WHERE id = $foreignKey";

        $statement = $connection->query($sql);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
