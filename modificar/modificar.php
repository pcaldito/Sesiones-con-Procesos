<?php
    session_start();
    include('../config.php');

    if (!isset($_SESSION['correo'])) {
        die("Error: No hay sesión iniciada.");
    }

    $correo_actual = $_SESSION['correo'];

    if (empty($_POST['correo']) || empty($_POST['nombre']) || empty($_POST['telefono'])) {
        die("Error: Todos los campos son obligatorios.");
    }

    $nuevo_correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "UPDATE usuario SET correo = ?, nombre = ?, telefono = ? WHERE correo = ?";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("ssss", $nuevo_correo, $nombre, $telefono, $correo_actual);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Datos actualizados correctamente.";
            $_SESSION['correo'] = $nuevo_correo;
            echo '<button><a href="../main.php">Volver al inicio</a></button>';
        } else {
            echo "No se realizaron cambios.";
        }
    } else {
        echo "Error en la ejecución: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
?>
