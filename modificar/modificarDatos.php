<?php
    session_start();

    // Habilitar la visualización de errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once('../config.php');

    // Verificar conexión a la base de datos
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conexion) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Verificar si la sesión tiene el correo
    if (!isset($_SESSION['correo'])) {
        die("Error: No has iniciado sesión.");
    }

    $correo = $_SESSION['correo'];

    // Preparar la consulta
    $query = "SELECT nombre, telefono FROM usuario WHERE correo = ?";
    $stmt = $conexion->prepare($query);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar si se encontró el usuario
    if (!$user) {
        die("Error: Usuario no encontrado.");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pablo">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../main.php">Volver a Inicio</a></li>
                <li><a href="../cambiar/cambiarContra.php">Cambiar Contraseña</a></li>
                <li><a href="../cerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form id="sesion" method="post" action="modificar.php">
            <label for="correo">Correo: </label>
            <input type="text" name="correo" value="<?php echo htmlspecialchars($correo); ?>" readonly>
            
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['nombre'] ?? ''); ?>">

            <label for="telefono">Teléfono: </label>
            <input type="text" name="telefono" value="<?php echo htmlspecialchars($user['telefono'] ?? ''); ?>">

            <input type="submit" value="Actualizar Datos">
        </form>
    </main>
</body>
</html>
