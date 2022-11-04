<?php 

require 'OperacionesDB.php';

require "Condiciones.php";



    header("Location: ../index.php?error= Rellena los campos vacios");

    if (isset($_POST['registrar'])) {
    
        $placa = $_POST['placa_del_vehiculo'];
        
        $tipo_vehiculo = $_POST['tipo_de_vehiculo'];
        
        $entidad = 'Carnaval';
        
        $funcion = new OperacionesDB($tipo_vehiculo,$placa,$entidad,null);
        
        $funcion->insertarEnDB();
    }
    
    if (isset($_GET['placa']) && isset($_GET['tipo'])) {
    
       $placaGet = $_GET['placa'];
    
       $tipo = $_GET['tipo'];
    
       $OperacionesDB = new OperacionesDB(null,null,null,$placaGet);
    
       $hora_salida = $OperacionesDB->obtenerTiempoSalida();
    
       $OperacionesDB->actualizarHoraSalida($placaGet,$hora_salida);
    
       $duracion_estancia = $OperacionesDB->obtenerDuracionEstancia();
    
       $OperacionesDB->actualizarEstancia($placaGet,$duracion_estancia);
    
       $CondicionPago = new Condiciones($duracion_estancia);
    
       switch ($tipo) {
        case 'vehiculo_oficial':
            $totalPagar = $CondicionPago->vehiculoOficial();
            break;
        case 'vehiculo_particular':
            $totalPagar = $CondicionPago->particular();
            break;
        case 'motocicleta':
            $totalPagar = $CondicionPago->motocicleta();
            break;
        case 'bicicleta':
            $totalPagar = $CondicionPago->bicicleta();
            break;
        case 'pesado':
            $totalPagar = $CondicionPago->pesado();
            break;
        default:
            $totalPagar = 0;
            break;
       }
    
       $actualizarPago = $OperacionesDB->actualizarPagoEstancia($placaGet,$totalPagar);
    
    
    
    }
    
    if (isset($_GET['placaEliminar'])) {
    
        $placaGet = $_GET['placaEliminar'];
        
        $OperacionesDB = new OperacionesDB(null,null,null,null);
    
        $OperacionesDB->eliminarDato($placaGet);
    
    }








?>