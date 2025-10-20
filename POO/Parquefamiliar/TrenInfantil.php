<?php

include_once("Atraccion.php");
include_once("GestionVisitantes.php");

class TrenInfantil extends Atraccion
{
    private $rechazos = ['altura' => 0, 'edad' => 0, 'condicion' => 0];
    public function __construct()
    {
        parent::__construct("Tren infantil", 15, 3);
    }

    public function usarTrenInfantil(GestionVisitantes $visitante)
    {
        echo "==== Verificacion de acceso ==== \n";
        echo "Visitante: {$visitante->getNombre()} ({$visitante->getEdad()}años, {$visitante->getAltura()}cm)\n";
        echo "Atraccion: {$this->nombre} \n";
        if ($visitante->getEdad() < 3 || $visitante->getEdad() > 10) {
            echo "✖️  Acceso denegado \n ";
            echo "Razón: No cumples con la edad necesaria\n";
            echo "-Edad requerida: Entre 3 y 10 años \n-Edad actual: {$visitante->getEdad()}años\n";
            echo "\nAtracciones disponibles para ti: \n";
            if ($visitante->getAltura() < 140) {
                echo "✖️  Montaña Rusa (No cumples con la altura necesaria) \n";
            } else {
                if ($visitante->getEdad() < 12) {
                    echo "✖️  Montaña Rusa (No cumples con la edad necesaria) \n";
                } else {
                    if ($visitante->getCondicion() === "Embarazada" || $visitante->getCondicion() === "embarazada") {
                        echo "✖️  Montaña Rusa (No se permite acceso a personas embarazadas) \n";
                    } else {
                        echo "✔️  Montaña Rusa (Sin restricciones) \n";
                    }
                }
            }
            if ($visitante->getEdad() < 8) {
                echo "✖️  Carrusel(Necesitas un adulto)\n";
            } else {
                echo "✔️  Carrusel (Sin restricciones) \n";
            }
            $this->rechazos['edad']++;
            return;
        }
        if ($visitante->getEdad() < 6) {
            echo "✖️  Acceso denegado \n ";
            echo "Razón: Debe ir acompañado de un adulto\n";
            echo "\nAtracciones disponibles para ti: \n";
            if ($visitante->getAltura() < 140) {
                echo "✖️  Montaña Rusa (No cumples con la altura necesaria) \n";
            } else {
                if ($visitante->getEdad() < 12) {
                    echo "✖️  Montaña Rusa (No cumples con la edad necesaria) \n";
                } else {
                    if ($visitante->getCondicion() === "Embarazada" || $visitante->getCondicion() === "embarazada") {
                        echo "✖️  Montaña Rusa (No se permite acceso a personas embarazadas) \n";
                    } else {
                        echo "✔️  Montaña Rusa (Sin restricciones) \n";
                    }
                }
            }
            if ($visitante->getEdad() < 8) {
                echo "✖️  Carrusel(Necesitas un adulto)\n";
            } else {
                echo "✔️  Carrusel (Sin restricciones) \n";
            }
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
