<?php
require_once("../conexion.php");

$conexion = conectar();

if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM roles WHERE id_rol = :id_rol");
    $consulta->bindParam(":id_rol",$_GET['id']);
    $consulta->execute();
    $rol=$consulta->fetchAll(PDO::FETCH_ASSOC)[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar rol</title>
</head>
<body>
    <a href="./roles.php">Volver</a>
    <h1>Actualizar rol</h1>
    <form action="./update_rol.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?=$rol['nombre_rol']?>">

        <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];

    $consulta = $conexion->prepare("UPDATE roles SET nombre_rol=:nombre WHERE id_rol=:id_rol");
    $consulta->bindParam(":nombre",$nombre);
    $consulta->bindParam(":id_rol",$id);
    $consulta->execute();
    header("location: ./roles.php");
}

?>