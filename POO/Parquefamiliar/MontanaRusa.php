<?php
include_once "GestionVisitantes.php";
include_once "Atraccion.php";

class MontanaRusa extends Atraccion
{
    private $rechazos = ['altura' => 0, 'edad' => 0, 'condicion' => 0];
    public function __construct()
    {
        parent::__construct("Montaña Rusa", 4, 5);
    }



    public function usarMontanaRusa(GestionVisitantes $visitante)
    {
        echo "==== Verificacion de acceso ==== \n";
        echo "Visitante: {$visitante->getNombre()} ({$visitante->getEdad()}años, {$visitante->getAltura()}cm)\n";
        echo "Atraccion: {$this->nombre} \n";
        if ($visitante->getAltura() < 140) {
            echo "✖️  Acceso denegado \n ";
            echo "Razón: Altura insuficiente\n";
            echo "-Requiere minimo: 140cm \n-Altura actual: {$visitante->getAltura()}cm\n-Diferencia: " . (140 - $visitante->getAltura()) . "cm";
            echo "\nAtracciones disponibles para ti: \n";
            if ($visitante->getEdad() < 3 || $visitante->getEdad() > 10) {
                echo "✖️  Tren infantil (No cumples con la edad necesaria) \n";
            } else {
                echo "✔️  Tren infantil (Sin restricciones) \n";
            }
            if ($visitante->getEdad() < 8) {
                echo "✖️  Carrusel(Necesitas un adulto)\n";
            } else {
                echo "✔️  Carrusel (Sin restricciones) \n";
            }
            $this->rechazos['altura']++;
            return;
        }
        if ($visitante->getEdad() < 12) {
            echo "✖️  Acceso denegado \n ";
            echo "Razón: Edad insuficiente\n";
            echo "-Edad minima: 12 años \n-Edad de la persona: {$visitante->getEdad()}años\n";
            echo "\nAtracciones disponibles para ti: \n";
            if ($visitante->getEdad() < 3 || $visitante->getEdad() > 10) {
                echo "✖️  Tren infantil (No cumples con la edad necesaria) \n";
            } else {
                echo "✔️  Tren infantil (Sin restricciones) \n";
            }
            if ($visitante->getEdad() < 8) {
                echo "✖️  Carrusel(Necesitas un adulto)\n";
            } else {
                echo "✔️  Carrusel (Sin restricciones) \n";
            }
            $this->rechazos['edad']++;
            return;
        }
        if ($visitante->getCondicion() === "Embarazada" || $visitante->getCondicion() === "embarazada") {
            echo "✖️  Acceso denegado \n ";
            echo "Razón: No se permite acceso a personas embarazadas\n";
            echo "\nAtracciones disponibles para ti: \n";
            if ($visitante->getEdad() < 3 || $visitante->getEdad() > 10) {
                echo "✖️  Tren infantil (No cumples con la edad necesaria) \n";
            } else {
                echo "✔️  Tren infantil (Sin restricciones) \n";
            }
            if ($visitante->getEdad() < 8) {
                echo "✖️   Carrusel(Necesitas un adulto)\n";
            } else {
                echo "✔️  Carrusel (Sin restricciones) \n";
            }
            $this->rechazos['condicion']++;
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
