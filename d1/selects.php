<?php
include_once('conexion.php');
$conexion=conectar();

function SelectRoles(){
$conexion = conectar();
if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM roles");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
return[];
}

function SelectCategorias(){
$conexion = conectar();
if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM categorias");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
return[];
}

function SelectPersonas(){
$conexion = conectar();
if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM personas p JOIN roles r ON p.id_rol=r.id_rol ");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
return[];
}

function SelectProductos(){
$conexion = conectar();
if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM productos c JOIN categorias ca ON c.id_categoria=ca.id_categoria");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
return[];
}

function SelectVentas(){
    $conexion = conectar();
    if($conexion){
    $consulta=$conexion->prepare("SELECT * FROM venta v JOIN personas p ON  v.id_persona=p.id_persona JOIN productos pr ON pr.id_producto = v.id_producto JOIN roles r ON p.id_rol = r.id_rol");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
    }
}
?>

