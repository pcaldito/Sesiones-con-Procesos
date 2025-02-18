<?php

    include('config.php');
    
    if(isset($_POST['correo'])){
        $correo=$_POST['correo'];
    }
    if(isset($_POST['pw'])){
        $pw=$_POST['pw'];
    }

    $conexion=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $sql="SELECT correo, pw FROM usuario WHERE correo=? AND pw=?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ss', $correo, $pw);

    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        echo "Inicio de sesion correcto";
        session_start();
        $_SESSION['correo'] = $correo;
        header("Location: main.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectas";
    }

    $stmt->close();
    $conexion->close();
?>



            
        
        
