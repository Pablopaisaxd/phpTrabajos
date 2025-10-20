<?php
        require_once('conexion.php');
        require_once('roles.php');

        $conexion = conectar();
        if($conexion){
            $consulta = $conexion->prepare(("SELECT * FROM usuarios WHERE id_usuario = :id_usuario"));
            $consulta -> bindParam(":id_usuario",$_GET['id']);
            $consulta -> execute();
            $usuario = $consulta->fetchAll()[0];
            print_r($usuario);
        }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>
<body>
    <form action="./update.php" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" value="<?= $usuario ['nombre'] ?>"><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" value="<?= $usuario['correo']?>"><br><br>
        <label for="rol">Rol:</label>
    <select name="rol" id="rol">
        <option value="">Seleccione..</option>
        <?php 
        $roles=consultarRoles();
        foreach($roles as $rol){
         ?>
         <option  <?= $rol['id_rol'] == $usuario['id_rol'] ?'selected': ''?> value="<?= $usuario['id_rol'] ?>"><?= $rol['Descripcion']?></option>  
         <?php   
        }
        
        ?>
    </select>
        <input type="submit" value="Enviar" name="submitUserUpdate">

    </form>

    <?php
    if(isset($_POST["submitUserUpdate"])){

        function actualizarusuario(){
        $conexion = conectar();
        if($conexion){
            $consulta = $conexion->prepare("UPDATE usuarios SET nombre= :nombre, correo=:correo, id_rol=:id_rol WHERE id_usuario=:id_usuario");
            $consulta ->bindParam(":nombre", $_POST['name']);
            $consulta->bindParam(":correo",$_POST['email'] );
            $consulta->bindParam(":id_rol",$_POST['rol']);
            $consulta->bindParam(":id_usuario",$_POST['id']);
            $consulta->execute();
            header("location: ./select.php");
        }
    }
    actualizarusuario();
    }
    ?>

</body>
</html>