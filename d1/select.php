<?php
include_once('conexion.php');

$conexion = conectar();

if($conexion){
    $consulta=$conexion->prepare("SELECT * FROM venta v JOIN personas p ON  v.id_persona=p.id_persona JOIN productos pr ON pr.id_producto = v.id_producto JOIN roles r ON p.id_rol = r.id_rol");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    ?>
<a href="./ventas/insert_ventas.php">Insertar</a>
    <h2>Ventas</h2>
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
            <!-- <th>Acciones</th> -->
        </tr>
        <?php
        foreach($resultados as $resultado ){

        ?>
        <tr>
            <td><?= $resultado ['id_venta']?></td>
            <td><?= $resultado['nombre_persona']?></td>
            <td><?=$resultado ['nombre_rol']?></td>
            <td><?= $resultado['correo']?></td>
            <td><?= $resultado['nombre_producto']?></td>
            <td><?= $resultado['descripcion']?></td>
            <td><?= $resultado['fecha_venta']?></td>
            <!-- <td>
                <a href="./update.php?id=<?=$resultado['id_venta'] ?>">Editar</a>
                <form action="./delete.php" method="POST">
                    <input type="hidden" name="id_uventa" value="<?= $resultado ['id_venta']?>">
                    <button>Eliminar</button>
                </form>
            </td> -->
        </tr>
        <?php
        }
        ?>
    </table>
    <a href="./personas/persona.php">Ver personas</a>
    <a href="./productos/productos.php">Ver productos</a>
    <a href="./categorias/categorias.php">Ver categorias</a>
    <a href="./roles/roles.php">Ver roles</a>
    
    <?php

    $conexion = null;
}

?>
