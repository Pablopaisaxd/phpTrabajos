<?php
include_once('conexion.php');

$conexion = conectar();

if($conexion){
    $consulta=$conexion->prepare("SELECT * FROM usuarios JOIN roles ON roles.id_rol=usuarios.id_rol");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    ?>
<a href="./insert.php">Insertar</a>
    <h2>Resultados de la consulta:</h2>
    <table border="*">
        <tr>
            <th>
                id
            </th>
            <th>nombres</th>
            <th>correos</th>
            <th>descripcion</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach($resultados as $resultado ){

        ?>
        <tr>
            <td><?= $resultado ['id_usuario']?></td>
            <td><?= $resultado['nombre']?></td>
            <td><?= $resultado['correo']?></td>
            <td><?= $resultado['Descripcion']?></td>
            <td><a href="./update.php?id=<?=$resultado['id_usuario'] ?>">Editar</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php

    $conexion = null;
}

?>
