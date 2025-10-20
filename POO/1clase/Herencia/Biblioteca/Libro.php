<?php

include_once("materialBiblioteca.php");

class Libro extends materialBiblioteca{
    private $numeroPagina;
    private $genero;

    public function __construct($titulo, $autor, $anioPublicacion, $numeroPagina, $genero){
        parent::__construct($titulo, $autor, $anioPublicacion);
        $this->numeroPagina=$numeroPagina;
        $this->genero=$genero;
    }

    public function mostrarInfo(){
        $infobase = parent::mostrarInfo();
        return "{$infobase} Numero de paginas: {$this->numeroPagina} Genero: {$this->genero}";
    }
    public function leerPagina($pagina){
        if($pagina < 0 || $pagina > $this->numeroPagina){
            echo "La pagina no existe dentro del libro {$this->titulo}";
            return;
        }
        echo "Estas leyendo la pagina: {$pagina}";
    }
}

// $libro = new Libro("Pepe", "Pepe", 2020, 200, "Terror");
// $libro->leerPagina(69);