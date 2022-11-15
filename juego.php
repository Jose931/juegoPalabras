<?php
session_start();
if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
    header("Location:login.php");
    
}else{
    echo "<p>Hola <p>" . $_SESSION['nombreUser'] . "<br>";
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/loginRegistro.css">
    <title>Document</title>
</head>
<body>
    

    <form action="logout.php">
        <input type="submit" name="Logout" value="Cerrar sesion">
    </form>
</body>
</html>