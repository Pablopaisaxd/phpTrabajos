<?php
        require_once('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar rol</title>
</head>
<body>
    <form action="./insertrol.php" method="post">
        <label for="rol">Rol</label>
        <input type="text" name="rol" id="rol">
        <input type="submit" value="Enviar" name="Enviar">

        <?php
        if(isset($_POST['Enviar'])){
            $rol = $_POST['rol'];
    
            $conexion = conectar();
    
            try {
                $consulta = $conexion -> prepare("INSERT INTO roles (Descripcion) VALUES (:Descripcion)");
                $consulta->bindParam(':Descripcion',$rol);
                $consulta->execute();
    
                echo "rol ingresado exitosamente";
            } catch (\Throwable $th) {
                echo "error al insertar la informacio". $th -> getMessage();
                exit();
            }
        }
        ?>
    </form>
</body>
</html>