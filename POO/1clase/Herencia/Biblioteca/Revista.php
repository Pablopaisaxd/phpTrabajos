<?php
include_once("materialBiblioteca.php");

class Revista extends materialBiblioteca{
    private $numeroEdicion;
    private $mesPublicacion;

    public function __construct($titulo, $autor, $anioPublicacion, $numeroEdicion, $mesPublicacion){
        parent::__construct($titulo, $autor, $anioPublicacion);
        $this->numeroEdicion=$numeroEdicion;
        $this->mesPublicacion=$mesPublicacion;
    }

    public function mostrarInfo(){
        $infobase = parent::mostrarInfo();
        return "{$infobase} Edicion: {$this->numeroEdicion} Mes de publicacion: {$this->mesPublicacion}";
    }
    public function verIndice(){
        return "Indice de la edicion: {$this->numeroEdicion} \n Mes de publicacion: {$this->mesPublicacion} \n Autor: {$this->autor}";
    }
}