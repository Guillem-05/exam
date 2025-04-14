<?php

class Connection {
    private $host;
    private $username;
    private $password;
    private $database;
    protected $connection;

    public function __construct() {
        $this->loadConfig();
    }

    private function loadConfig() {
        $config = json_decode(file_get_contents(__DIR__ . 'conf.json'), true);
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];
    }

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Conexion fallida: " . $this->connection->connect_error);
        }
    }

    public function disconnect() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>