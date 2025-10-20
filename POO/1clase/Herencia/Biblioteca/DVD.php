<?php

include_once("materialBiblioteca.php");

class DVD extends materialBiblioteca{
    private $duracionMinutos;
    private $clasificacion;

    public function __construct($titulo, $autor, $anioPublicacion, $duracionMinutos, $clasificacion){
        parent::__construct($titulo, $autor, $anioPublicacion);
        $this->duracionMinutos=$duracionMinutos;
        $this->clasificacion=$clasificacion;
    }

    public function mostrarInfo(){
        $infobase = parent::mostrarInfo();
        return "{$infobase} Duracion: {$this->duracionMinutos}minutos Clasificacion: {$this->clasificacion}";
    }
    public function reproducir (){
        echo "Se esta reproduciendo {$this->titulo}";
    }
}

$dvd = new DVD("nose", "nose", 2020,60, "PEGI");
$dvd->reproducir();
echo $dvd->mostrarInfo();