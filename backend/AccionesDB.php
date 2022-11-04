<?php 

require "Conexion.php";

class AccionesDb extends Conexion {

    public function __conntruct(){

        parent::__construct();
        
    }

    public function obtenerData () {

        $sql = "SELECT * FROM entrada_vehiculos ORDER BY hora_entrada";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array());

        $resultado_sentencia = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado_sentencia;
        
        $sentencia->closeCursor();

        $this->conexionDB = null;

    }

    public function InsertarFila ( $placa, $tipo, $entidad, $hora_entrada ) {

        $sql = "INSERT INTO `entrada_vehiculos`(`placa`, `tipo`, `entidad`, `hora_entrada`) VALUES (
            :placa,
            :tipo,
            :hora_entrada,
            :entidad
        )";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':placa'=>$placa,':tipo'=>$tipo,':entidad'=>$entidad,':hora_entrada'=>$hora_entrada));

        $sentencia->closeCursor();

        $this->conexionDB = null;

        header("Location: ../index.php?estado=true");

    }

    public function actualizarHoraSalida ($placa,$hora_salida) {

        $sql = "UPDATE `entrada_vehiculos` SET `hora_salida` = :hora_salida WHERE placa = :placa";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':hora_salida'=>$hora_salida,':placa'=>$placa));

        $sentencia->closeCursor();

        $this->conexionDB = null;


    }


    public function actualizarEstancia ($placa,$duracion_estancia) {

        $sql = "UPDATE `entrada_vehiculos` SET `duracion_estancia` = :duracion_estancia WHERE placa = :placa";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':duracion_estancia'=>$duracion_estancia,':placa'=>$placa));

        $sentencia->closeCursor();

        $this->conexionDB = null;

        header("Location: ../salida.php");

    }

    public function actualizarPagoEstancia ($placa, $pago) {

        $sql = 'UPDATE `entrada_vehiculos` SET `pago_estancia` = :pago_estancia WHERE placa = :placa';

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':pago_estancia'=>$pago,'placa'=>$placa));

        $sentencia->closeCursor();

        $this->conexionDB = null;

    }

    public function eliminarDato ($placa){

        $sql = "DELETE FROM entrada_vehiculos WHERE placa = :placa";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':placa'=>$placa));

        $sentencia->closeCursor();

        $this->conexionDB = null;

        header("Location: ../salida.php");

    }

    public function seleccionarDato ($placa) {

        $sql = "SELECT * FROM entrada_vehiculos WHERE placa = :placa";

        $sentencia = $this->conectar_DB()->prepare($sql);

        $sentencia->execute(array(':placa'=>$placa));

        $resultado_sentencia = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $resultado_sentencia;

        $sentencia->closeCursor();

        $this->conexionDB = null;
        
    }

}


?>