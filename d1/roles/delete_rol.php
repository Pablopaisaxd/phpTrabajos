<?php

require_once("../conexion.php");

$conexion=conectar();

if($conexion){
    $id=$_POST['id_rol'];

    $consulta=$conexion->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
    $consulta->bindParam(":id_rol",$id);
    $consulta->execute();
}

    echo "rol eliminado correctamente: registros eliminados: ".$consulta->rowCount() ."<br>";
    echo '<a href="./roles.php"> volver al inicio </a>';
?>