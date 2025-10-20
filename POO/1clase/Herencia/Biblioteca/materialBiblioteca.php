<?php

class materialBiblioteca{
    protected $titulo;
    protected $autor;
    protected $anioPublicacion;
    protected $codigo;

    public function __construct($titulo, $autor, $anioPublicacion){
        $this->titulo=$titulo;
        $this->autor=$autor;
        $this->anioPublicacion=$anioPublicacion;
        $this->codigo=$this->generarCodigo();

    }
        private function generarCodigo(){
        return rand(1,999);
    }

    public function mostrarInfo(){
        return "Titulo: {$this->titulo}\n Autor: {$this->autor} \n Año de Publicacion: {$this->anioPublicacion} \n Codigo: {$this->codigo}";
    }

    public function esAntiguo (){
        if(2025 - $this->anioPublicacion >= 20){
            echo "El libro es antiguo \n";
        }else {
            echo "El libro es nuevo \n";
        }
    }
}

// $libro = new materialBiblioteca("Pepito", "Pepito", 2020);

// $libro->esAntiguo();
// echo $libro->mostrarInfo();

