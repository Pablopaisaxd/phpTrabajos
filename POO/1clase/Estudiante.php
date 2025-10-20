<?php

class Estudiante{
    public $nombre;
    private $codigo;
    public $programa;
    private $Notas=[];

    public function __construct($nombre,$programa){
        $this->nombre = $nombre;
        $this->codigo = $this->generarCodigo();
        $this->programa=$programa;
    }

    private function generarCodigo(){
        return "CTA-".rand(10000,99999);
    }

    public function agregarNotas($notas){
        foreach($notas as $nota){
            $this->Notas[]=$nota;
        }
    }

    public function detallesEstudiante(){
        return  [
            "nombre" => $this->nombre,
            "codigo"=> $this->codigo,
            "programa" => $this->programa,
            "notas" => $this->Notas
        ];
    }
}
$estudiante = new Estudiante("pablo","ADSO");

$cantidadNotas=intval(readline("Ingrese la cantidad de notas que desea ingresar:"));
$sum = 0;
for ($i=0; $i < $cantidadNotas; $i++) { 
    $Notas[$i]= readline("Ingrese una nota:"); 
    $sum += $Notas[$i];
}
$promedio = $sum/$cantidadNotas;
$estudiante->agregarNotas($Notas);
$detalles = $estudiante->detallesEstudiante();
echo "\nEstudiante: {$detalles['nombre']}\n";
echo "Código: {$detalles['codigo']}\n";
echo "Programa: {$detalles['programa']}\n";
echo "Notas: " . implode(", ", $detalles['notas']) . "\n";
echo "Promedio: {$promedio}"

?>