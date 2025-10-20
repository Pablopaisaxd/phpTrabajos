<?php
include_once("Estudiante.php");
include_once("Profesor.php");
class Aula{
    private $numeroAula;
    private $estudiantes = [];
    private $profesor;

    public function __construct($numeroAula){
        $this->numeroAula=$numeroAula;
    }

    public function agregarEstudiante($estudiante){
        $this->estudiantes[]=$estudiante;
        echo "Estudiante {$estudiante->getNombre()} agregado al aula {$this->numeroAula}";
    }

    public function agregarProfesor($profesor){
        $this->profesor = $profesor;
        echo "Profesor {$profesor->getNombre()} agregado al aula {$this->numeroAula}";
    }

    public function mostrarInformacio(){
        echo "\n ====== Aula {$this->numeroAula} ====== \n";
        echo "Profesor ".($this->profesor ? $this->profesor : 'Sin Asignar')." \n";
        echo "Estudiantes (".count($this->estudiantes).")";
        foreach ($this->estudiantes as $estudiante){
            echo "$estudiante \n";
        }
        echo "\n";
    }
}
$estudiante1 = new Estudiante("Ana Garcia",101);
$estudiante2 = new Estudiante("Carlos lopez",102);

$profesor = new Profesor("Dr. yepes", "Matemáticas");

$aula1 = new Aula("A-101");

$aula1->mostrarInformacio();

$aula1->agregarProfesor($profesor);
$aula1->agregarEstudiante($estudiante1);
$aula1->mostrarInformacio();
