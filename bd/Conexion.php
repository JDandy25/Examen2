<?php

class Conexion{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "examen";

    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->servername,$this->username, $this->password, $this->db_name);
    
        if($this->conn->connect_error){
            die("Conecion fallida". $this->conn->connect_error);
        }
    }
          
    public function getConexion(){
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}

?>