<?php
include_once("Vehiculo.php");

class Moto extends Vehiculo{
    private $cilindraje;

    public function __construct($marca, $modelo, $anio, $cilindraje){
        parent::__construct($marca, $modelo, $anio);
        $this->cilindraje=$cilindraje;
    }

    public function obtenerInformacion(){
        $infoBase = parent::obtenerInformacion();
        return "{$infoBase} - Motocicleta de  {$this->cilindraje} cc";
    }

    public function hacerCaballito(){
        if($this->encendido){
            echo "Haciendo un caballito \n";
        } else {
            echo "No se peude hacer un caballito con la moto apagada \n";
        }
    }
}