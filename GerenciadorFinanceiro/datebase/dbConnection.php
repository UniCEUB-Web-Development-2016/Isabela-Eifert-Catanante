<?php
/**
 * Created by PhpStorm.
 * User: Isabela
 * Date: 06/04/2016
 * Time: 01:31
 */


class connection{

    private $servername; //ip
    private $dbname;
    private $username;
    private $password;

    public function __construct($servername, $dbname, $username, $password)
    {
        $this-> servername = $servername;
        $this -> dbname = $dbname;
        $this-> username = $username;
        $this-> password = $password;
    }

    public function getConnection()
    {
        try
        {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        } 
    }

}