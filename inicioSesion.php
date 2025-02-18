<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Pablo">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <h2>Inicio de Sesion</h2>
        <form id="sesion" method="post" action="procesar.php">
            <label for="correo">Correo: </label>
            <input type="text" name="correo">
            <label for="contrasenia">Contraseña: </label>
            <input type="password" name="pw">
            <input type="submit" value="ENVIAR">
        </form>
    </body>
</html>