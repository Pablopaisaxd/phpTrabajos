<?php
include_once("./Ingrediente.php");
class Inventario {

    private $listaIngredientes = [];



    public function agregarIngrediente ($nombre, $cantidad){
        $ingredienteNuevo= new Ingrediente($nombre, $cantidad);
        $this->listaIngredientes[]=$ingredienteNuevo;
    }

    public function eliminarIngrediente($nombre){
        foreach ($this->listaIngredientes as $key => $ingrediente) {
            if($ingrediente->getNombre() == $nombre){
                unset($this->listaIngredientes[$key]);
                echo "Se elimino: {$nombre} \n";
                return;
            }else{
                echo "ingrediente {$nombre} no se encontro \n";
            }
        }
    }

    public function VerificarDisponibilidad($nombre){
        foreach ($this->listaIngredientes as $key => $ingrediente) {
            if($ingrediente->getNombre()==$nombre){
                echo "Ingrediente {$nombre} disponible \n";
            }else{
                echo "Ingrediente {$nombre} no disponible \n";
            }
        }
    }

    public function actualizarCantidad($nombre, $cantidad){
        foreach ($this->listaIngredientes as $key => $ingrediente) {
            if ($ingrediente->getNombre() == $nombre){
                $ingrediente->setCantidad($cantidad);
                echo "La cantidad del ingrediente {$nombre} se actualizo a {$cantidad} \n";
                return;
            }
            echo "No se encontro el ingrediente {$nombre} \n";
        }
    }

    public function reporteInventario(){
        echo "Inventario actual: \n";
        foreach ($this->listaIngredientes as $key => $ingrediente) {
            $ingrediente->mostrarInfo();
        }
    }

    public function __destruct(){
        echo "Destruyendo inventario....";
    }
}

// $inventario = new Inventario();
// $inventario->agregarIngrediente("Yuca", 2);

// $inventario->reporteInventario();

// $inventario->actualizarCantidad("Yuca", 4);

// $inventario->reporteInventario();
// $inventario->VerificarDisponibilidad("Yuca");