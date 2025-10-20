<?php
        require_once('conexion.php');
        require_once('roles.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>
<body>
    <form action="./insert.php" method="POST">
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="rol">Rol:</label>
    <select name="rol" id="rol">
        <option value="">Seleccione..</option>
        <?php 
        $roles=consultarRoles();
        foreach($roles as $rol){
         ?>
         <option value="<?= $rol['id_rol'] ?>"><?= $rol['Descripcion']?></option>  
         <?php   
        }
        
        ?>
    </select>
        <input type="submit" value="Enviar" name="submit">

    </form>

    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['rol'];

        $conexion = conectar();

        try {
            $consulta = $conexion -> prepare("INSERT INTO usuarios (nombre,correo,id_rol) VALUES (:nombre, :correo, :id_rol)");
            $consulta->bindParam(':nombre',$name);
            $consulta->bindParam(':correo',$email);
            $consulta->bindParam(':id_rol',$role);
            $consulta->execute();

            echo "usuario ingresado exitosamente";
        } catch (\Throwable $th) {
            echo "error al insertar la informacio". $th -> getMessage();
            exit();
        }
    }
    ?>

</body>
</html>