<?php
    session_start();
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
                    <li><a href="../modificar/modificarDatos.php">Modificar Datos</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form id="sesion" method="post" action="cambio.php">
                <label for="correo">Correo: </label>
                <input type="text" name="correo" disabled placeholder="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
                <label for="contrasenia">Contraseña Nueva: </label>
                <input type="text" name="nuevapw">
                <input type="submit" value="Cambiar Contraseña">
            </form>
        </main>
    </bod