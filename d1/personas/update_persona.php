<?php
require_once("../conexion.php");
require_once("../selects.php");
$conexion=conectar();

if($conexion){
    $consulta = $conexion->prepare("SELECT * FROM personas WHERE id_persona = :id_persona");
    $consulta->bindParam("id_persona", $_GET['id']);
    $consulta->execute();
    $persona = $consulta->fetchAll(PDO::FETCH_ASSOC)[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar persona</title>
</head>
<body>
    <a href="./persona.php">Volver</a>
    <form action="./update_persona.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?=$persona["nombre_persona"]?>"><br>
        <label for="correo">Correo:</label><br>
        <input type="email" name="correo" id="correo" value="<?=$persona["correo"]?>"><br>
        <label for="edad">Edad:</label><br>
        <input type="number" name="edad" id="edad" value="<?=$persona["edad"]?>"><br>
        <label for="rol">Rol:</label><br>
        <select name="rol" id="rol">
            <option value="">Seleccione</option>
            <?php
            $roles=SelectRoles();
            foreach($roles as $rol){
            ?>
            <option <?= $rol['id_rol'] == $persona['id_rol'] ? 'selected':''?> value="<?= $rol['id_rol']?>"><?= $rol['nombre_rol']?></option>
            <?php
            }
            ?>
        </select>
        <button name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];
    $id = $_POST['id'];
    $conexion = conectar();
    if($conexion){
        $actualizar = $conexion->prepare("UPDATE personas SET nombre_persona= :nombre, correo=:correo,edad=:edad, id_rol=:id_rol WHERE id_persona=:id_persona");
        $actualizar -> bindParam(":nombre",$nombre);
        $actualizar-> bindParam(":correo",$correo);
        $actualizar-> bindParam(":edad",$edad);
        $actualizar-> bindParam(":id_rol", $rol);
        $actualizar->bindParam(":id_persona",$id);
        $actualizar->execute();
        header("location: ./persona.php");
    }
}

?>