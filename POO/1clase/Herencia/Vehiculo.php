<?php

class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $anio;
    protected $encendido;

    public function __construct($marca, $modelo, $anio){
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->anio=$anio;
        $this->encendido=false;
    }

    public function encender(){
        $this->encendido = true;
        echo "El vehiculo ha sido encendido \n";
    }

    public function apagar(){
        $this->encendido = false;
        echo "El vehiculo ha sido apagado \n";
    }

    public function obtenerInformacion (){
        return "{$this->marca} {$this->modelo} ($this->anio)";
    }
}