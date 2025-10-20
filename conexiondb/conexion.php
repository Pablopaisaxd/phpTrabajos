<?php
include_once('config.php');
$servidor="127.0.0.1";
$usuario="root";
$password ="";
$baseDatos="prueba726";

function conectar(){
    try {
        $conexion = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME,
            DB_USER,
            DB_PASS
        );
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (\Throwable $th) {
        echo "Error: ". $th->getMessage();
        return null;
    }
}



?>