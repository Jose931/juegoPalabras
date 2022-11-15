<?php

        require('config.php');
        session_start();

        $nombreUsuario = $_POST['username'];
        $contraseñaComp = $_POST['password'];

        $sql = "SELECT * from usuarios where usuario = '$nombreUsuario'";

        $resultados = $conexion->query($sql);

        $fila = mysqli_fetch_assoc($resultados);
        
       
        if(password_verify($contraseñaComp, $fila['contraseña'])){
                // echo "true";
                $_SESSION['logueado'] = true;
                $_SESSION['nombreUser'] = $nombreUsuario;
                header("Location:juego.php");
        }else{
                // echo "false";
                $_SESSION['logueado'] = false;
                header("Location:login.php");   
        }
    
?>