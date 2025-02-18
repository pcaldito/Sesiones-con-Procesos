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
                    <li><a href="../cambiar/cambiarContraseña.php">Cambiar Contraseña</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form id="sesion" method="post" action="modificar.php">
                <label for="correo">Correo: </label>
                <input type="text" name="correo" placeholder="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre">
                <label for="telefono">Telefono: </label>
                <input type="text" name="telefono">
                <input type="submit" value="Actualizar Datos">
            </form>
        </main>
    </body>
</html>