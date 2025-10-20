<?php

class Estudiante{
    private $nombre;
    private $id;

    public function __construct($nombre, $id){
        $this->nombre=$nombre;
        $this->id = $id;
    }

    public function __tostring(){
        return "{$this->nombre} (ID: {$this->id})";
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getId(){
        return $this->id;
    }
}