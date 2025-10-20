<?php

require_once("../conexion.php");
$conexion = conectar();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar nuevo rol</title>
</head>
<body>
    <a href="./roles.php">Volver</a>
    <h1>Insertar neuvo rol</h1> <br>
    <form action="./insert_rol.php" method="post">
        <label for="nonbre">Nonbre</label>
        <input type="text" name="nombre" id="nombre"><br>

        <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php
if(isset($_POST["enviar"])){
    $nombre = $_POST["nombre"];

    $insertar = $conexion->prepare("INSERT INTO roles (nombre_rol) VALUES (:nombre)");
    $insertar->bindParam(":nombre",$nombre);
    $insertar->execute();
    header("location: ./roles.php");
}



?>