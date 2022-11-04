<?php

date_default_timezone_set('America/Bogota');

if (isset($_GET['estado'])) {
    $status = null;
    $status = $_GET['estado'];
}


?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- INCLUIMOS CDN DE BOOTSTRAP PARA EL DISEÑO GENERAL-->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- INCLUIMOS ICONO DE PRUEBA -->

    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3713/3713345.png">

    <link rel="stylesheet" href="estilos/estilos.css">

    <title>PRUEBA</title>

</head>

<body>

    <!-- LLAMO AL COMPONENT NAV -->

    <?php require "nav.php" ?>

    <div class="contAll">

        <form action="backend/reciboDatos.php" method="post" class="formulario">

            <h1 style="font-weight: 700;">AUTOMATIZACION DE ACCESO DE VEHICULOS</h1>

            <div class="mb-3">

                <label for="placa_del_vehiculo" class="form-label">Placa del Vehiculo</label>

                <input type="text" name="placa_del_vehiculo" required id="placa_del_vehiculo" placeholder="AAA-324" class="form-control">

            </div>



            <label for="tipo_de_vehiculo" class="form-label">Tipo de vehiculo</label>

            <select name="tipo_de_vehiculo" id="tipo_de_vehiculo" require class="form-select">

                <option disabled selected class="font-semibold" value="">Seleccione el tipo de vehiculo</option>

                <option value="vehiculo_oficial" class="font-semibold">Vehiculo Oficial</option>

                <option value="vehiculo_particular" class="font-semibold">Vehiculo Particular</option>

                <option value="motocicleta" class="font-semibold">Motocicleta</option>

                <option value="bicicleta" class="font-semibold">Bicicleta</option>

                <option value="pesado" class="font-semibold">Pesado</option>

            </select>

            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary mt-4">

            <input type="hidden" id="mensaje" value="<?php echo $status ?>">

            <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    echo "<div class='alert alert-danger errorN1 mt-4' role='alert'>$error</div>";
                }
            ?>
        </form>

    </div>

    <!-- INCLUYO CDN JS DE BOOTSTRAP -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- INCLUYO LIBRERIA SWEET ALERT PARA ALERTAS -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="main.js"></script>

</body>

</html>