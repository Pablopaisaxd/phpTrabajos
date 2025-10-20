<?php

require_once("../conexion.php");
$conexion = conectar();

if($conexion){
    $id=$_POST["id_categoria"];

    $consulta = $conexion->prepare("DELETE FROM categorias WHERE id_categoria = :id_categoria");
    $consulta ->bindParam(":id_categoria",$id);
    $consulta->execute();

    echo "categoria eliminada correctamente: registros eliminados: ".$consulta->rowCount() ."<br>";
    echo '<a href="./categorias.php"> volver al inicio </a>';

}
?>