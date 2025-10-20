<?php

include_once("Vehiculo.php");

class Automovil extends Vehiculo{
    private $puertas;
    private $tipo;

    public function __construct($marca, $modelo, $anio, $puertas, $tipo){
        //Padre
        parent::__construct($marca, $modelo, $anio);
        //Hijo
        $this->puertas=$puertas;
        $this->tipo=$tipo;
    }

    //Sobreescritura
    public function obtenerInformacion(){
        $infoBase = parent::obtenerInformacion();
        return "{$infoBase} {$this->tipo} de {$this->puertas} puertas";
    }

    public function abrirMaletero(){
        echo "Maletero abierto \n";
    }
}