<?php

session_start();
if(isset($_SESSION['id_persona'])){
    if(isset($_SESSION['rol'])&& $_SESSION['rol']==1){
        header("location: ./loginadmin/admin.php");
    }elseif (isset($_SESSION['rol'])&& $_SESSION["rol"]== 4){
        header("location: ./vendedor/vendedor.php");
    }
}

require_once("./conexion.php");
$conexion = conectar();

if(isset($_POST['correo'])){
    $correo = $_POST['correo'];
    $contraseña = $_POST['contrasena'];

    $consulta = $conexion->prepare("SELECT * FROM personas WHERE correo = '$correo'");
    $consulta->execute();
    $fila = $consulta->fetch(PDO::FETCH_ASSOC);

     if ($fila && $contraseña == $fila['contrasena']) {
        $_SESSION['id_persona'] = $fila['id_persona'];
        $_SESSION['nombre'] = $fila['nombre_persona'];
        $_SESSION['rol'] = $fila['id_rol'];
        header("Location: ./loginadmin/admin.php");
    } else {
        echo "Correo o clave incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="./login.php" method="post">
        <label for="correo">Correo</label><br>
        <input type="email" name="correo" id="correo" required>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <button name="login">Iniciar sesion</button>
    </form>
</body>
</html>