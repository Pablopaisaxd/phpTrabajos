<?php
include_once "GestionVisitantes.php";
include_once "MontanaRusa.php";
include_once "TrenInfantil.php";
include_once "Carrusel.php";
include_once "Reporte.php";

date_default_timezone_set('America/Bogota');

$visitantes = [
    new GestionVisitantes("Ana", 13, 150, 1234567890, "nose@gmail.cm"),
    new GestionVisitantes("Luis", 1, 175, 1234567891, "nose@gmail.com")
];

$montanaRusa = new MontanaRusa();
$trenInfantil = new TrenInfantil();
$carrusel = new Carrusel();
$atracciones = [$montanaRusa, $trenInfantil, $carrusel];

$montanaRusa->usarMontanaRusa($visitantes[0]);
$montanaRusa->usarMontanaRusa($visitantes[1]);

echo "\n===== ESTADO ACTUAL =====\n";
echo "Hora:" . date("h:i") . "\n";
echo $montanaRusa->mostrarInfo() . "\n";
echo $trenInfantil->mostrarInfo() . "\n";
echo $carrusel->mostrarInfo() . "\n";

$reporte = new Reporte($visitantes, $atracciones);
$reporte->generar();
