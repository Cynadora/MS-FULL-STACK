<?php
class Database
{
    private $servername = "localhost";
    private $username = "admin";
    private $password = "Isis4ever";
    private $dbname = "district";
    public $connect;

    public function ConnexionBase(){
        $this->connect = null;

        try{
            $this->connect = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->connect->exec("set names utf8");
        } catch (PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connect;
        }
}
