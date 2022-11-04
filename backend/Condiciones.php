<?php

class Condiciones {
    public function __construct($tiempoEstancia)
    {
     $this->tiempoEstancia = intdiv($tiempoEstancia,1);  
    }

    public function vehiculoOficial (){
        $totalPagar = 0;
        return $totalPagar;

    }

    public function bicicleta (){
        $tarifa = 5;
        $totalPagar = $tarifa * $this->tiempoEstancia;
        return $totalPagar;
    }

    public function motocicleta (){
        $tarifa = 20;
        $totalPagar = $tarifa * $this->tiempoEstancia;
        return $totalPagar;
    }

    public function particular () {
        $tarifa = 40;
        $totalPagar = $tarifa * $this->tiempoEstancia;
        return $totalPagar;
    }

    public function pesado (){
        $tarifa = 50;
        $totalPagar = $tarifa * $this->tiempoEstancia;
        return $totalPagar;
    }

}


?>