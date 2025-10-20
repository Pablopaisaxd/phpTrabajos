<?php

class Ingrediente {
    private $nombre;
    private $cantidadDisponible;

    public function __construct($nombre,$cantidadDisponible){
        $this->nombre=$nombre;
        $this->cantidadDisponible=$cantidadDisponible;
    }

    public function mostrarInfo(){
        echo "Nombre:{$this->nombre} \nCantidad:{$this->cantidadDisponible} \n";
    }

    public function consumir($consumir){
        if($this->cantidadDisponible < 0 && $consumir < 0){
            echo "No hay suficiente cantidad para consumir";
        }
        $this->cantidadDisponible -= $consumir;
    }



    public function getNombre(){
        return $this->nombre;
    }

    public function setCantidad($cantidadNueva){
        if ($cantidadNueva < 0){
            echo "Ingrese una cantidad mayor a 0";
            return;
        }
        $this->cantidadDisponible = $cantidadNueva;
    }

        public function __destruct(){
        echo "Destruyendo ingredientes... \n";
    }
}

// $ingrediente = new Ingrediente("Arroz", 5);

// $ingrediente->mostrarInfo();
// $ingrediente->consumir(2);
// $ingrediente->mostrarInfo();