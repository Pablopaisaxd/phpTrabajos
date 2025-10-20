<?php

require_once("../conexion.php");
$conexion = conectar();

if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM productos p JOIN categorias c ON c.id_categoria=p.id_categoria");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="../select.php">Volver</a><br><br>
<a href="./insert_productos.php">Insertar Nuevo producto</a>
<h2>Productos</h2>
<table border="*">
<tr>
    <th>id</th>
    <th>producto</th>
    <th>categoria</th>
    <th>precio</th>
    <th>stock</th>
</tr>

<?php

foreach($resultados as $resultado){

    ?>
    <tr>
        <td><?=$resultado['id_producto']?></td>
        <td><?= $resultado['nombre_producto']?></td>
        <td><?= $resultado['nombre_categoria']?></td>
        <td><?= $resultado['precio']?></td>
        <td><?= $resultado['stock']?></td>
        <td>
            <a href="./update_productos.php?id=<?=$resultado['id_producto']?>">Editar</a>
            <form action="./delete_productos.php" method="post">
                <input type="hidden" name="id_producto" value="<?= $resultado['id_producto']?>">
                <button>Eliminar</button>
            </form>
        </td>
    </tr>
<?php    
}
?>
</table>