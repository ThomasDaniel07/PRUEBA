<?php

include "DB/configDB.php";

class Conexion
{

    public $conexionDB;

    public function conectar_DB (){

        try {

            $this->conexionDB = new PDO("mysql:host=".HOSTNAME."; dbname=".DB, USERNAME, PASSWORD);

            $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conexionDB->exec("SET CHARACTER SET utf8");
            
            return $this->conexionDB;


        } catch (Exception $e) {

            echo "La linea con el error es : ". $e->getLine();

        }

    }
}


$conexion = new Conexion();

$conexion->conectar_DB();

?>