<?php

require_once "../selects.php";

$personas=SelectPersonas();
$productos=SelectProductos();
session_start();

if(isset($_SESSION['id_persona'])){
    if($_SESSION['rol']!=1){
        header("location: ../login.php");
        exit;
    }
}
$nombre=$_SESSION['nombre']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../logout.php">Cerrar Sesión</a>
    <h2>Bienvenido, <?php echo $nombre; ?>!</h2>
    <h2>Personas</h2>
<table border="*">
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Edad</th>
        <th>Rol</th>
    </tr>

    <?php
    foreach($personas as $persona){
    ?>
    <tr>
        <td><?= $persona['id_persona']?></td>
        <td><?= $persona['nombre_persona']?></td>
        <td><?= $persona['correo']?></td>
        <td><?= $persona['edad']?></td>
        <td><?= $persona['nombre_rol']?></td>
    </tr>

<?php
    }
?>
</table>
<table border="*">
<tr>
    <th>id</th>
    <th>producto</th>
    <th>categoria</th>
    <th>precio</th>
    <th>stock</th>
</tr>
    <h2>Productos</h2>
<?php

foreach($productos as $producto){

    ?>

    <tr>
        <td><?=$producto['id_producto']?></td>
        <td><?= $producto['nombre_producto']?></td>
        <td><?= $producto['nombre_categoria']?></td>
        <td><?= $producto['precio']?></td>
        <td><?= $producto['stock']?></td>
    </tr>

<?php
}
?>
    </table>
<h1>Que deseas ingresar?</h1>
<h3><a href="../personas/insert_persona.php">Ingresar nueva persona</a></h3><br>
<h3><a href="../productos/insert_productos.php">Ingresar nuevo producto</a></h3>
</body>
</html>