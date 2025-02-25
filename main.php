<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Pablo">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="cambiar/cambiarContraseña.php">Cambiar Contraseña</a></li>
                    <li><a href="modificar/modificarDatos.php">Modificar Datos</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
        <main>
        <?php 
            if (isset($_SESSION['correo'])) {
                echo '<p id="saludo">Hola ' . htmlspecialchars($_SESSION['correo']). '</p>';
            } else {
                echo 'Hola invitado';
            }
        ?>
        </main>
    </body>
</html>