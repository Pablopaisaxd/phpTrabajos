<?php

include_once("Atraccion.php");
include_once("GestionVisitantes.php");

class Carrusel extends Atraccion
{
    private $rechazos = ['altura' => 0, 'edad' => 0, 'condicion' => 0];
    public function __construct()
    {
        parent::__construct("Carrusel", 30, 4);
    }

    public function usarCarrusel(GestionVisitantes $visitante)
    {
        echo "==== Verificacion de acceso ==== \n";
        echo "Visitante: {$visitante->getNombre()} ({$visitante->getEdad()}años, {$visitante->getAltura()}cm)\n";
        echo "Atraccion: {$this->nombre} \n";
        if ($visitante->getEdad() < 8) {
            echo "✖️  Acceso denegado \n";
            echo "Razón: Debe ir acompañado de un adulto\n";
            echo "\nAtracciones disponibles para ti: \n";
            echo "✔️  Tren infantil (Sin restricciones) \n";
            echo "✖️  Montaña Rusa (No cumples con la edad necesaria) \n";
            $this->rechazos['edad']++;
            return;
        }

        echo "✔️  Acceso permitido \n";
        if ($this->ocupacion < $this->capacidad) {
            $this->ocupacion++;
            $this->totalVisitas++;
        } else {
            $this->cola[] = $visitante;
        }
    }
    public function getRechazos()
    {
        return $this->rechazos;
    }

    public function mostrarInfo()
    {
        $infobase = parent::mostrarInfo();
        return "{$infobase}";
    }
}
