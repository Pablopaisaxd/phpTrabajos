<?php
include_once("Atraccion.php");
include_once("GestionVisitantes.php");
date_default_timezone_set('America/Bogota');


class Reporte
{
    private $visitantes = [];
    private $atracciones = [];

    public function __construct($visitantes, $atracciones)
    {
        $this->visitantes = $visitantes;
        $this->atracciones = $atracciones;
    }

    public function generar()
    {
        echo "===== REPORTE DIARIO =====\n";
        echo "Fecha: " . date("d/m/Y") . "\n\n";


        $total = count($this->visitantes);
        echo " Total de visitantes: {$total}\n";


        $niños = 0;
        $adultos = 0;
        $terceraEdad = 0;
        foreach ($this->visitantes as $visitante) {
            if ($visitante->getEntrada() === "Niño") $niños++;
            elseif ($visitante->getEntrada() === "Adulto") $adultos++;
            else $terceraEdad++;
        }
        echo " - Niños: {$niños} (" . ($total > 0 ? round($niños / $total * 100) : 0) . "%)\n";
        echo " - Adultos: {$adultos} (" . ($total > 0 ? round($adultos / $total * 100) : 0) . "%)\n";
        echo " - Tercera Edad: {$terceraEdad} (" . ($total > 0 ? round($terceraEdad / $total * 100) : 0) . "%)\n\n";


        $masPopular = null;
        foreach ($this->atracciones as $atraccion) {
            if (!$masPopular || $atraccion->getTotalVisitas() > $masPopular->getTotalVisitas()) {
                $masPopular = $atraccion;
            }
        }

        echo " ATRACCIÓN MÁS POPULAR:\n";
        if ($masPopular) {
            $horas = max(1, (date("G") ?: 1));
            $promedioHora = round($masPopular->getTotalVisitas() / $horas);
            echo " - {$masPopular->getNombre()}: {$masPopular->getTotalVisitas()} visitas (promedio {$promedioHora} por hora)\n\n";
        }

        echo " ESTADÍSTICAS POR ATRACCIÓN:\n";
        foreach ($this->atracciones as $atraccion) {
            echo " - {$atraccion->getNombre()}: {$atraccion->getTotalVisitas()} visitas\n";
        }


        $rechazosAltura = 0;
        $rechazosEdad = 0;
        $rechazosCondicion = 0;

        foreach ($this->atracciones as $atraccion) {
            $rechazos = $atraccion->getRechazos();
            $rechazosAltura += $rechazos['altura'];
            $rechazosEdad += $rechazos['edad'];
            $rechazosCondicion += $rechazos['condicion'];
        }

        $totalRechazos = $rechazosAltura + $rechazosEdad + $rechazosCondicion;
        echo "\nACCESOS DENEGADOS: {$totalRechazos}\n";
        echo " - Por altura: {$rechazosAltura}\n";
        echo " - Por edad: {$rechazosEdad}\n";
        echo " - Por condición médica: {$rechazosCondicion}\n";

        $tiempos = [];
        foreach ($this->atracciones as $atraccion) {
            $tiempos[] = $atraccion->espera();
        }
        $promedioEspera = count($tiempos) > 0 ? round(array_sum($tiempos) / count($tiempos)) : 0;
        echo "\nTIEMPO PROMEDIO DE ESPERA: {$promedioEspera} minutos\n";
    }
}
