<?php

class GestionVisitantes
{

    protected $nombre;
    protected $edad;
    protected $altura;
    protected $telefono;

    protected $email;
    protected $condicionEspecial;
    protected $tipoEntrada;

    public function __construct($nombre, $edad, $altura, $telefono, $email, $condicionEspecial = false)
    {
        $this->setNombre($nombre);
        $this->setEdad($edad);
        $this->setAltura($altura);
        $this->setTelefono($telefono);
        $this->setEmail($email);
        $this->condicionEspecial = $condicionEspecial;
        $this->setTipoEntrada();
    }

    public function setNombre($nombre)
    {
        if (empty($nombre)) {
            throw new Exception("El nombre no puede estar vacío.");
        } elseif (filter_var($nombre, FILTER_VALIDATE_INT)) {
            throw new Exception("El nombre no puede ser un número.");
        } elseif (strlen($nombre) < 2) {
            throw new Exception("El nombre no puede contener menos de 2 palabras");
        }
        $this->nombre = $nombre;
    }

    public function setEdad($edad)
    {
        if ($edad < 1 || $edad > 120) {
            throw new Exception("Solo se permiten visitantes que esten entre 1 y 120 años de edad. ");
        }
        $this->edad = $edad;
    }

    public function setAltura($altura)
    {
        if ($altura < 60 || $altura > 220) {
            throw new Exception("La altura permitida es entre 60 y 220cm");
        }
        $this->altura = $altura;
    }

    public function setTelefono($telefono)
    {
        if (strlen((string)$telefono) !== 10) {
            throw new Exception("El numero solo puede ser de 10 digitos");
        }
        $this->telefono = $telefono;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El email no es valido");
        }
        $this->email = $email;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function getCondicion()
    {
        return $this->condicionEspecial;
    }

    public function getEntrada()
    {
        return $this->tipoEntrada;
    }

    public function setTipoEntrada()
    {
        if ($this->edad <= 12 && $this->edad > 0) {
            $this->tipoEntrada = "Niño";
        } elseif ($this->edad > 12 && $this->edad <= 64) {
            $this->tipoEntrada = "Adulto";
        } else {
            $this->tipoEntrada = "Tercera edad";
        }
    }

    public function mostrarInfo()
    {
        return "Nombre: " . $this->nombre . ",\n" . "Edad: " . $this->edad . " años, \n" . "Altura: " . $this->altura . " cm, \n" . "Telefono: " . $this->telefono . ", \nEmail: " . $this->email . ", \n" . ($this->condicionEspecial ? "Condicion especial: {$this->condicionEspecial}" : "Sin condicion especial") . ", \nTipo de entrada: " . $this->tipoEntrada . "\n";
    }
}
