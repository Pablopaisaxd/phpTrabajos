<?php

include_once("Automovil.php");
include_once("Moto.php");

$auto = new Automovil("Toyota", "Corrola", 2024, 4, "Sedan");
echo $auto->obtenerInformacion(). "\n";
$auto->encender();
$auto->abrirMaletero();
$auto->apagar();

$moto = new Moto("Honda", "CBR", 2019, 600);
echo $moto->obtenerInformacion(). "\n";
$moto->hacerCaballito();
$moto->encender();
$moto->hacerCaballito();