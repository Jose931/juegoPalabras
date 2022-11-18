<?php
    include("validacionRegistro.php");
    require("config.php");


    
    
    if($_SERVER["REQUEST_METHOD"] = "POST"){
       
        if(!empty($_POST['registrar'])){

            
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $contraseña2 = $_POST['contraseña2'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $error = 'form-element-error';
            $bien = 'form-element';

           
            $comUser = validacionUser($usuario);
            $comContraseña = validacionContraseñas($contraseña, $contraseña2);
            $comNombre = validacionNombre($nombre);
            $comApellido = validacionApellido($apellido);

            if(!$comUser || !$comContraseña || $comNombre!=1 || $comApellido !=1){
                echo "Hay campos que no has rellenado bien";
            }else{
                $encriptada = password_hash($contraseña, PASSWORD_BCRYPT);
                $insertUsuarios = "INSERT into usuarios values('$usuario', '$encriptada')";
                $insertJugadores = "INSERT into jugadores values ('$usuario', '$nombre', '$apellido', '')";
                $insertar = $conexion->query($insertUsuarios);
                $insertar = $conexion ->query($insertJugadores);
                echo "Bien hecho";

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
    <link rel="stylesheet" href="estilos/loginRegistro.css">
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
                <input type='password' id="contraseña" name="contraseña" placeholder="Contraseña" required/><br>
            </div>
            <div class="form-element">
                <input type='password' id="contraseña2" name="contraseña2" placeholder="Repita contraseña" required/><br>
            </div>
            <div id="caja_checkbox">
                    <input class="check" type="checkbox" name="verContraseña" id="verContraseña">
                    <label for="verContraseña" id="verContraseñaLabel">Mostrar ambas contraseñas</label>
            </div>
            <div class="form-element">
                <input type='text' id="nombre" name="nombre" placeholder="Nombre" value="<?php if(!empty($_POST['nombre'])) {echo $_POST['nombre'];}?>" required/><br>
            </div>
            <div class="form-element">
                <input type='text' id="apellido" name="apellido" placeholder="Apellido"  name="apellido" placeholder="Primer apellido" value="<?php if(!empty($_POST['apellido'])) {echo $_POST['apellido'];}?>" required/><br>
            </div>
            <br>

            <div class="botonFormulario">
                <input class="enviar" type="submit" id="registrar" name="registrar">
                <a class="enlaceRegistro" href="login.php">¿Ya tienes cuenta?</a>
            </div>
        </form>
    </div>
</body>
<script>
    {
        document.getElementById("verContraseña").addEventListener("click", function () {

            var pw = document.getElementById("contraseña");
            var pw2 = document.getElementById("contraseña2");
            if (pw.type == "password") {
                pw.type = "text";
            } else {
                pw.type = "password";
            }

            if(pw2.type == "password"){
                pw2.type = "text";
            }else{
                pw2.type = "password";
            }

        });
    }
</script>
</html>
