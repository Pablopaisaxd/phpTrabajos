<?php
require_once("../conexion.php");
$conexion = conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar categoria</title>
</head>
<body><form action="./insert_categoria.php" method="post">
    <h1>Insertar categora</h1><br><br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];

    $insertar = $conexion->prepare("INSERT INTO categorias (nombre_categoria) VALUE (:nombre_categoria)");
    $insertar->bindParam(":nombre_categoria",$nombre);
    $insertar->execute();
    header("location: ./categorias.php");
}


?>