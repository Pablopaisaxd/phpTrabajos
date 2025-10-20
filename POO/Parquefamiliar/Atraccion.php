<?php

class Atraccion
{
    protected $nombre;
    protected $capacidad;
    protected $duracion;
    protected $ocupacion = 0;
    protected $cola = [];
    protected $totalVisitas = 0;

    public function __construct($nombre, $capacidad, $duracion)
    {
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
        $this->duracion = $duracion;
    }

    public function espera()
    {
        $ciclo = ceil(count($this->cola) / $this->capacidad);
        return $ciclo * $this->duracion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getTotalVisitas()
    {
        return $this->totalVisitas;
    }
    public function mostrarInfo()
    {
        return
            "===== {$this->nombre} ===== \n" .
            "Personas en la atraccion:{$this->ocupacion}/{$this->capacidad}\n" .
            "Personas en la cola: " . count($this->cola) . "\n" .
            "Tiempo estimado de espera: {$this->espera()} minutos\n" .
            "Total de visitas hoy: {$this->totalVisitas} \n" .
            "========================";
    }
}
