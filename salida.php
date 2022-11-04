<?php

include "backend/AccionesDB.php";
                    
$DATA = new AccionesDb();

$arrayConData = $DATA->obtenerData();

?>

<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- INCLUIMOS CDN DE BOOTSTRAP PARA EL DISEÑO GENERAL-->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- INCLUIMOS HOJA DE ESTILO ESPECIFICO -->

    <link rel="stylesheet" href="estilos/estilos.css">

    <!-- INCLUIMOS ICONO DE PRUEBA -->


    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3713/3713345.png">

    <title>PRUEBA</title>

</head>

<body>

    <?php require 'nav.php' ?>

    <div class="contAll">
        <table class="table table-light shadow-lg">
            <thead class="table-dark">
                <tr>
                <th>Placa</th>
                <th>Tipo de vehiculo</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Duracion de la instancia</th>
                <th>Pago de la estancia</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php
    
                        foreach ($arrayConData as $row) {
    
                            $placa = $row['placa'];
    
                            $tipo = $row['tipo'];
    
                            $hora_entrada = $row['hora_entrada'];
    
                            $hora_salida = $row['hora_salida'];
    
                            $pago_estancia = $row['pago_estancia'];
    
                            $duracion_estancia = $row['duracion_estancia'];
    
                            echo "
                            <tr>
                                <th>$placa</th>
                                <td>$tipo</td>
                                <td>$hora_entrada</td>
                                <td>$hora_salida</td>
                                <td>$duracion_estancia min</td>
                                <td>$pago_estancia $ COP</td>
                                <td><a class='btn btn-success' href='backend/reciboDatos.php?placa=$placa&tipo=$tipo'>Dar Salida</a></td>
                                <td><a class='btn btn-danger' href='backend/reciboDatos.php?placaEliminar=$placa'>Eliminar</a></td>
                            </tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>


    <!-- INCLUYO CDN JS DE BOOTSTRAP -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>