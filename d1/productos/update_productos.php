<?php
require_once("../conexion.php");
require_once("../selects.php");
$conexion=conectar();

if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM productos WHERE id_producto = :id_producto");
    $consulta->bindParam("id_producto", $_GET['id']);
    $consulta->execute();
    $producto = $consulta->fetchAll(PDO::FETCH_ASSOC)[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
</head>
<body>
    <a href="./productos.php">Volver</a>
    <form action="./update_productos.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?=$producto["nombre_producto"]?>"><br>
        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" id="precio" value="<?=$producto["precio"]?>"><br>
        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" value="<?=$producto["stock"]?>"><br>
        <label for="categoria">categoria:</label><br>
        <select name="categoria" id="categoria">
            <option value="">Seleccione</option>
            <?php
            $categorias=SelectCategorias();
            foreach($categorias as $categoria){
            ?>
            <option <?= $categoria['id_categoria'] == $producto['id_categoria'] ? 'selected':''?> value="<?= $categoria['id_categoria']?>"><?= $categoria['nombre_categoria']?></option>
            <?php
            }
            ?>
        </select>
        <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];
    $conexion = conectar();
    if($conexion){
        $actualizar = $conexion->prepare("UPDATE productos SET nombre_producto= :nombre, precio=:precio,stock=:stock, id_categoria=:id_categoria WHERE id_producto=:id_producto");
        $actualizar -> bindParam(":nombre",$nombre);
        $actualizar-> bindParam(":precio",$precio);
        $actualizar-> bindParam(":stock",$stock);
        $actualizar-> bindParam(":id_categoria", $categoria);
        $actualizar->bindParam(":id_producto",$id);
        $actualizar->execute();
        header("location: ./productos.php");
    }
}

?>