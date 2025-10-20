<?php

require_once("../conexion.php");
require_once("../selects.php");
$conexion = conectar();

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar persona</title>
</head>
<body>
    <h1>Insertar persona nueva</h1>
    <form action="./insert_persona.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label for="correo">Correo</label>
    <input type="email" name="correo" id="correo">

    <label for="edad">edad</label>
    <input type="number" name="edad" id="edad">

    <label for="contraseña">Contraseña</label>
    <input type="password" name="contraseña" id="contraseña">

    <select name="rol" id="rol">
        <option value="">Seleccione</option>
        <?php
        $roles = SelectRoles();
        foreach($roles as $rol){
        ?>
    <option value="<?=$rol['id_rol']?>"><?=$rol['nombre_rol']?></option>
        <?php
        }
        ?>
    </select>
    <button name="guardar">Guardar</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $correo=$_POST['correo'];
    $edad = $_POST['edad'];
    $roles = $_POST['rol'];
    $contraseña = $_POST['contraseña'];

    $consulta=$conexion->prepare("INSERT INTO personas (nombre_persona,correo,contrasena,edad,id_rol)VALUE (:nombre,:correo,:contrasena,:edad,:id_rol)");
    $consulta->bindParam(":nombre",$nombre);
    $consulta->bindParam(":correo",$correo);
    $consulta->bindParam(":contrasena",$contraseña);
    $consulta->bindParam(":edad",$edad);
    $consulta->bindParam(":id_rol",$roles);
    $consulta->execute();
    if(isset($_SESSION['id_persona'])){
        header("location: ../loginadmin/admin.php");
    }else{
    header("location:./persona.php");
    }
}
?>