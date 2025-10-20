<?php

require_once("../conexion.php");
$conexion = conectar();

if($conexion){
    $id=$_POST["id_producto"];

    $consulta = $conexion->prepare("DELETE FROM productos WHERE id_producto = :id_producto");
    $consulta ->bindParam(":id_producto",$id);
    $consulta->execute();

    echo "producto eliminado correctamente: registros eliminados: ".$consulta->rowCount() ."<br>";
    echo '<a href="./productos.php"> volver al inicio </a>';

}
?>