<?php 

class Plato {
    private $nombre;
    private $precio;
    private $tiempoPreparacion;

    public function __construct($nombre, $precio, $tiempoPreparacion){
        if (empty($nombre)){
            throw new Exception("El nombre no puede estar vacio");
        }
        if($precio < 0){
            throw new Exception("El precio debe ser positivo");
        }
        if($tiempoPreparacion < 0){
            throw new Exception("El tiempo de preparacion no es valido");
            
        }

        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->tiempoPreparacion=$tiempoPreparacion;
    }

    public function mostrarInfo(){
        echo "Nombre: {$this->nombre} \n Precio: {$this->precio} \n Tiempo de Preparacion: {$this->tiempoPreparacion}minutos";
    }
}

$Plato = new Plato("Arroz con huevo", 1200, 5);

$Plato->mostrarInfo();