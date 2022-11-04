<?php

date_default_timezone_set('America/Bogota');

require "AccionesDB.php";

class OperacionesDB extends AccionesDb {

    protected $tipo;
    protected $placa;
    protected $hora_entrada;
    protected $entidad;
    protected $placaGet;

    public function __construct($tipo,$placa,$entidad,$placaGet)
    {
        $this->tipo = $tipo;

        $this->placa = $placa;

        $this->hora_entrada = date('Y-m-d H:i:s');
        
        $this->entidad = $entidad;

        $this->placaGet = $placaGet;

    }

    public function insertarEnDB (){

        $funcion = new AccionesDb;

        $funcion->InsertarFila($this->placa,$this->tipo,$this->hora_entrada,$this->entidad);

    }

    public function obtenerTiempoSalida (){

        // $funcion = new AccionesDb();

        // $resultado = $funcion->seleccionarDato($this->placaGet);

        // $hora_entradaDB = strtotime($resultado[0]['hora_entrada']);

        $hora_salida = date('Y-m-d H:i:s');

        // $tiempoEstancia = round((($hora_salida - $hora_entradaDB)/60),0);

        return $hora_salida;

    }

    public function obtenerDuracionEstancia (){

        $funcion = new AccionesDb();

        $resultado = $funcion->seleccionarDato($this->placaGet);

        $hora_entradaDB = strtotime($resultado[0]['hora_entrada']);

        $hora_salida = strtotime(date('Y-m-d H:i:s'));

        $tiempoEstancia = round((($hora_salida - $hora_entradaDB)/60),0);

        return $tiempoEstancia;

    }

}



?>