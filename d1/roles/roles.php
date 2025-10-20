<?php

require_once("../conexion.php");
require_once("../selects.php");
?>
<a href="../select.php">Volver</a><br><br>
<a href="./insert_rol.php">Insertar rol nuevo</a>
<h2>Roles</h2>
<table border="*">
    <tr>
        <th>id</th>
        <th>Nombre</th>
    </tr>

    <?php
    $resultados=SelectRoles();
    foreach($resultados as $resultado){
    ?>
    <tr>
        <td><?= $resultado['id_rol']?></td>
        <td><?= $resultado['nombre_rol']?></td>
        <td>
            <a href="./update_rol.php?id=<?=$resultado['id_rol']?>">Editar</a>
            <form action="./delete_rol.php" method="post">
                <input type="hidden" name="id_rol" value="<?=$resultado['id_rol']?>">
                <button>Eliminar</button>
            </form>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>