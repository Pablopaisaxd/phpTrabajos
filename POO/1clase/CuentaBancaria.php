<?php

class CuentaBancaria{
    private $numeroCuenta;
    private $saldo;
    private $propietario;

    // CONTRUCTOR
    public function __construct($propietario, $saldo=0){
        $this->numeroCuenta=$this->generarNumeroCuenta();
        $this->saldo=$saldo;
        $this->propietario=$propietario;
    }
    // Metodo Privado
    private function generarNumeroCuenta(){
        return "CTA-".rand(10000,99999);
    }

    // Metodos
    public function depositar($monto){
        if($monto <=0){
            echo "El monto debe ser positivo \n";
            return false;
        }

        $this->saldo += $monto;
        echo "Deposito exitoso. Saldo actual:{$this->saldo}";
        return true;
    }

    public function retirar($monto){
        if ($monto <= 0) {
            echo "El monto debe ser positivo \n";
            return false;
        }
        if($this->saldo - $monto <0){
            echo "Saldo insuficiente";
            return false;
        }

        $this->saldo -= $monto;
        echo "Retiro exitoso. \n Saldo actual: {$this->saldo} ";
        return true;
    }

    public function consultarSaldo(){
        return "El saldo de la cuenta es: ".$this->saldo;
    }

    public function obtenerDetalles (){
        return [
            "numeroCuenta"=>$this->numeroCuenta,
            "saldo"=>$this->saldo,
            "propietario"=>$this->propietario
        ];
    }
}

$cuenta = new CuentaBancaria("Pablo",69000);
$detalles = $cuenta->obtenerDetalles();

echo "Cuenta Numero:{$detalles['numeroCuenta']}";
echo "Propietario:{$detalles['propietario']}";
echo "Saldo:{$detalles['saldo']}";

$cuenta -> depositar(100);
$cuenta ->retirar(50);

echo $cuenta->consultarSaldo();
?>