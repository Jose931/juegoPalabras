<?php
session_start();
if(isset($_SESSION['logeado']) || !$_SESSION['loegueado']){
    header("Location:login.php");
}


echo "Hola " . $_SESSION['nombreUSer'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Usuario logeado </p>

    <form action="logout.php">
        <<input type="submit" name="Logout" value="Cerrar sesion">
    </form>
</body>
</html>