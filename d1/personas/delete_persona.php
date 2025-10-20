<?php

require_once("../conexion.php");
$conexion = conectar();

if($conexion){
    $id=$_POST["id_persona"];

    $consulta = $conexion->prepare("DELETE FROM personas WHERE id_persona = :id_persona");
    $consulta ->bindParam(":id_persona",$id);
    $consulta->execute();

    echo "Persona eliminada correctamente: registros eliminados: ".$consulta->rowCount() ."<br>";
    echo '<a href="./persona.php"> volver al inicio </a>';

}
?>