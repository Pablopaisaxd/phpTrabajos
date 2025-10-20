<?php

require_once("../conexion.php");



$conexion = conectar();
if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM personas p JOIN roles r ON p.id_rol = r.id_rol ");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="../select.php">Volver</a>
<br><br><br>
<a href="./insert_persona.php">Insertar Nueva persona</a>
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
    foreach($resultados as $resultado){
    ?>
    <tr>
        <td><?= $resultado['id_persona']?></td>
        <td><?= $resultado['nombre_persona']?></td>
        <td><?= $resultado['correo']?></td>
        <td><?= $resultado['edad']?></td>
        <td><?= $resultado['nombre_rol']?></td>
        <td>
            <a href="./update_persona.php?id=<?=$resultado['id_persona']?>">Editar</a>
            <form action="./delete_persona.php" method="POST">
                    <input type="hidden" name="id_persona" value="<?= $resultado ['id_persona']?>">
                    <button>Eliminar</button>
                </form>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>