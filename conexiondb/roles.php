<?php
include_once('conexion.php');

function consultarRoles(){
    $conexion = conectar();
    if($conexion){
        $consulta=$conexion->prepare("SELECT * FROM roles");
        $consulta->execute();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    return[];
}

function ActualizarRoles(){
    $conexion = conectar();
    if($conexion){
        $consulta = $conexion->prepare("UPDATE roles SET Descripcion = :Descripcion WHERE id_rol = :id_rol");
        $consulta->bindParam(":Descripcion", $_POST['']);
    }
};

?>