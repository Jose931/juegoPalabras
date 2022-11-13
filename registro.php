<?php
    include("validacionRegistro.php");

    
    if($_SERVER["REQUEST_METHOD"] = "POST"){
       
        if(!empty($_POST['registrar'])){
            $user = validacionUser($_POST['usuario']);
            $contraseña = validacionContraseñas($_POST['password'], $_POST['password2']);
            $nombre = validacionNombre($_POST['nombre']);
            $aspellido = validacionApellido($_POST['apellido']);

            if($user && $contraseña && $nombre && $apellido){
                echo "Hay campos que no has rellenado bien";
            }else{
                header("Location:login.php");
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/login.css">
    <title>Document</title>
</head>

<body>

    <div class = "container">
        <h2>Formulario registro</h2><br>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method=POST>
            <div class="form-element">
                <input type='text' id="usuario" name="usuario" placeholder="Usuario"value ="<?php if(!empty($_POST['usuario'])) {echo $_POST['usuario'];}?>" required/><br>
            </div>
            <div class="form-element">
                <input type='password' id="password" name="password" placeholder="Contraseña" required/><br>
            </div>
            <div class="form-element">
                <input type='password' id="password2" name="password2" placeholder="Repita contraseña" required/><br>
            </div>
            <div class="form-element">
                <input type='text' id="nombre" name="nombre" placeholder="Nombre" value="<?php if(!empty($_POST['nombre'])) {echo $_POST['nombre'];}?>" required/><br>
            </div>
            <div class="form-element">
                <input type='text' id="apellidos" name="apellidos" placeholder="Apellido" value="<?php if(!empty($_POST['apellido'])) {echo $_POST['apellido'];}?>" required/><br>
            </div>
            <br>

            <div class="botonFormulario">
                <input class="enviar" type="submit" id="registrar" name="registrar">
                <a class="enlaceRegistro" href="login.php">¿Ya tienes cuenta?</a>
            </div>
        </form>
    </div>
</body>
</html>
