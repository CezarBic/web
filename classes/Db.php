<?php
class Db{

    private $host;
    private $user;
    private $password;
    private $dbname;

    protected function connect(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = 'root';
        $this->dbname = 'web';
        

        try{
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
        }catch (PDOException $e){
        echo "Connection fail: " . $e->getMessage();
        }
    }
}

class DbMsqli{
    private $host;
    private $user;
    private $password;
    private $db;

    protected function connect(){
        $this->host = 'localhost';
        $this->user = 'cezar';
        $this->password = 'Cezar131$';
        $this->db = 'web';

        $connect = new mysqli($this->host, $this->user, $this->password, $this->db);
        return $connect;
    }
}