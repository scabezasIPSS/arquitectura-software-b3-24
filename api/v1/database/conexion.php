<?php

class Conexion
{
    //aplicando encapsulamiento
    private $connection;
    private $host;
    private $username;
    private $password;
    private $db;
    private $port;
    private $server;

    public function __construct()
    {
        $this->server = $_SERVER['HTTP_HOST'];
        $this->connection = null;
        $this->port = 3306;
        $this->db = 'ipss_asb324';
        $this->username = 'ipss_asb324';
        $this->password = 'l4cl4v3-1p55';
    }

    public function getConnection(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        mysqli_set_charset($this->connection, 'utf8');
        if (!$this->connection){
            return mysqli_connect_errno();
        }
        return $this->connection;
    }

    public function closeConnection(){
        mysqli_close($this->connection);
    }
}
