<?php

require_once("../conexion.php");
require_once("../selects.php");

$conexion=conectar();

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar venta</title>
</head>
<body>
    <a href="../select.php">Volver</a>
    <h1>Insertar venta nueva</h1>
    <form action="./insert_ventas.php" method="post">
        <label for="nombre">Quien realizo la venta?</label><br>
        <select name="nombre" id="nombre">
            <option value="">Seleccione</option>
            <?php
            $personas = SelectPersonas();
            foreach($personas as $persona){
            ?>
            <option value="<?=$persona['id_persona']?>"><?=$persona['nombre_persona']?></option>
            <?php
            }
            ?>
        </select><br>
        <label for="producto">Que producto vendió?</label><br>
        <select name="producto" id="producto">
            <option value="">Seleccione</option>
            <?php
            $productos=SelectProductos();
            foreach($productos as $producto){
            ?>
            <option value="<?=$producto['id_producto']?>"><?=$producto['nombre_producto']?></option>
            <?php
            }
            ?>
        </select><br><br>

        <label for="descripcin">Descripcion de la venta</label><br>
        <input type="text" name="descripcion" id="descripcion"><br><br>

        <button name="enviar">Enviar</button>
    </form>
</body>
</html>
<?php

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];

    $insert = $conexion->prepare("INSERT INTO venta (id_persona,id_producto,descripcion) VALUES (:nombre,:producto,:descripcion)");
    $insert->bindParam(":nombre",$nombre);
    $insert->bindParam(":producto",$producto);
    $insert->bindParam(":descripcion",$descripcion);
    $insert->execute();
        if(isset($_SESSION['id_persona'])){
        header("location: ../vendedor/vendedor.php");
    }else{
    header("location:../select.php");
    }
}

?>