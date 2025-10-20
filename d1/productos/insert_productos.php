<?php

require_once("../conexion.php");
require_once("../selects.php");
$conexion = conectar();

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
</head>
<body>
    <h1>Insertar producto nuevo</h1>
    <form action="./insert_productos.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label for="precio">precio</label>
    <input type="number" name="precio" id="precio">

    <label for="stock">stock</label>
    <input type="number" name="stock" id="stock">


    <select name="categoria" id="categoria">
        <option value="">Seleccione</option>
        <?php
        $categorias = SelectCategorias();
        foreach($categorias as $categoria){
        ?>
    <option value="<?=$categoria['id_categoria']?>"><?=$categoria['nombre_categoria']?></option>
        <?php
        }
        ?>
    </select>
    <button name="guardar">Guardar</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $precio=$_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];

    $consulta=$conexion->prepare("INSERT INTO productos (nombre_producto,precio,stock,id_categoria)VALUE (:nombre,:precio,:stock,:id_categoria)");
    $consulta->bindParam(":nombre",$nombre);
    $consulta->bindParam(":precio",$precio);
    $consulta->bindParam(":stock",$stock);
    $consulta->bindParam(":id_categoria",$categoria);
    $consulta->execute();
    if(isset($_SESSION['id_persona'])){
            header("location:../loginadmin/admin.php");
    }else{
            header("location:./productos.php");
    }
}
?>