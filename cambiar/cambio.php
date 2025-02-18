<?php
    session_start();
    include('../config.php');

    if(isset($_POST['nuevapw']) && !empty($_POST['nuevapw'])){
        $nuevapw = $_POST['nuevapw']; 
    } else {
        die("Error: No se recibió la nueva contraseña.");
    }

    if(!isset($_SESSION['correo'])){
        die("Error: No hay sesión iniciada.");
    }

    $correo = htmlspecialchars($_SESSION['correo']);

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$conexion){
        die("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "UPDATE usuario SET pw = ? WHERE correo = ?";

    $stmt = $conexion->prepare($sql);
    if(!$stmt){
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param('ss', $nuevapw, $correo);

    if($stmt->execute()){
        if($stmt->affected_rows > 0){
            echo "Contraseña actualizada correctamente.";
            echo '<button><a href="../main.php">Volver al inicio</a></button>';
        } else {
            echo "No se realizaron cambios en la contraseña.";
        }
    } else {
        echo "Error en la ejecución: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?>
