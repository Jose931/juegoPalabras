<?php

        require('config.php');
        session_start();

        $nombreUsuario = $_POST['username'];
        $contraseñaComp = $_POST['password'];

        $sql = "SELECT * from usuarios where usuario = '$nombreUsuario'";

        $resultados = $conexion->query($sql);

        $fila = mysqli_fetch_assoc($resultados);
        echo $fila['contraseña'] . "<br>";
        echo "El passworf_verify me da: " . password_verify($contraseñaComp, $fila['contraseña']);
       
        if(password_verify($contraseñaComp, $fila['contraseña'])){
                $_SESSION['logueado'] = true;
                $_SESSION['nombreUser'] = $nombreUsuario;
                header("Location:juego.php");
        }else{
                $_SESSION['logueado'] = false;
                header("Location:login.php");   
        }
    
?>