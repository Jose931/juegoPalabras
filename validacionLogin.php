<?php

        require('config.php');
        include('funcionesJuego.php');
        session_start();

        $nombreUsuario = $_POST['username'];
        $contraseñaComp = $_POST['password'];

        $sql = "SELECT * from usuarios where usuario = '$nombreUsuario'";

        $resultados = $conexion->query($sql);

        $fila = mysqli_fetch_assoc($resultados);
        
        if(password_verify($contraseñaComp, $fila['contraseña'])){
                $_SESSION['entrada'] = true;
                $_SESSION['logueado'] = true;
                $_SESSION['nombreUser'] = $nombreUsuario;
                $_SESSION['partida'] = 1;
                crearCookie($_SESSION['partida']);
                header("Location:juego.php");
        }else{
                $_SESSION['entrada'] = false;
                $_SESSION['logueado'] = false;
                header("Location:login.php");   
        }
        $conexion->close();
    
?>