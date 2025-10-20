<?php

require_once("../conexion.php");
$conexion=conectar();

if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM categorias WHERE id_categoria = :id_categoria");
    $consulta->bindParam("id_categoria", $_GET['id']);
    $consulta->execute();
    $categoria = $consulta->fetchAll(PDO::FETCH_ASSOC)[0];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar categoria</title>
</head>
<body>
    <h1>Actualizar categoria</h1><br>
    <form action="./update_categoria.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre" value="<?=$categoria['nombre_categoria']?>">
    <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $actualizar = $conexion->prepare("UPDATE categorias SET nombre_categoria=:nombre_categoria WHERE id_categoria=:id_categoria");
    $actualizar->bindParam(":nombre_categoria",$nombre);
    $actualizar->bindParam(":id_categoria",$id);
    $actualizar->execute();
    header("location: ./categorias.php");
}
?>