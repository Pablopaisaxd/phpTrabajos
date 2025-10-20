<?php
require_once("../conexion.php");
require_once("../selects.php");
$resultados=SelectCategorias();
?>
<a href="../select.php">Volver</a><br><br>
<a href="./insert_categoria.php">Insertar nueva categoria</a>
<h2>Categorias</h2>
<table border="*">
    <tr>
        <th>id</th>
        <th>nombre</th>
    </tr>

<?php
foreach($resultados as $resultado){


?>

<tr>
    <td><?= $resultado['id_categoria']?></td>
    <td><?= $resultado['nombre_categoria']?></td>
    <td>
        <a href="./update_categoria.php?id=<?=$resultado['id_categoria']?>">Editar</a>
        <form action="./delete_categoria.php" method="POST">
                    <input type="hidden" name="id_categoria" value="<?= $resultado ['id_categoria']?>">
                    <button>Eliminar</button>
                </form>
    </td>
</tr>
<?php

}
?>
</table>