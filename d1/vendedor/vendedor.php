<?php

require_once "../selects.php";

$personas=SelectPersonas();
$productos=SelectProductos();
session_start();

if(isset($_SESSION['id_persona'])){
    if($_SESSION['rol']!=4){
        header("location: ../login.php");
        exit;
    }
}
$nombre=$_SESSION['nombre'];

$ventas = SelectVentas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor</title>
</head>
<body>
    <h1>Ventas</h1>
    <table border="*">
        <tr>
            <th>
                id
            </th>
            <th>Persona</th>
            <th>Rol</th>
            <th>correo</th>
            <th>producto</th>
            <th>descripcion</th>
            <th>fecha</th>
        </tr>
        <?php
        foreach($ventas as $venta ){

        ?>
        <tr>
            <td><?= $venta ['id_venta']?></td>
            <td><?= $venta['nombre_persona']?></td>
            <td><?=$venta ['nombre_rol']?></td>
            <td><?= $venta['correo']?></td>
            <td><?= $venta['nombre_producto']?></td>
            <td><?= $venta['descripcion']?></td>
            <td><?= $venta['fecha_venta']?></td>
        </tr>
        <?php
        }
        ?>
    </table>

    <h1>Deseas ingresar una venta nueva?</h1>
    <h3><a href="../ventas/insert_ventas.php">Insertar nueva venta</a></h3>
</body>
</html>