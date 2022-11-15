<?php
 
include('config.php');
session_start();
 
if (!empty($_POST['register'])) {
 
    $nombreUsuario = $_POST['username'];
    $contraseñaComp = $_POST['password'];
 
    $query = "SELECT contraseña FROM usuarios WHERE usuario LIKE '$nombreUsuario'";
    $resultado = $conexion->query($query) or die($mysqli->error . " en la linea " . (__LINE__-1));
    
    if (password_verify($contraseñaComp, $resultado->fetch_column()) == 1) {
        echo "<br>" . "Deberia entrar por aqui";
    } else {
        echo "Entra por donde no debe";
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
    <title>Tu Juego de Palablas</title>
</head>
<body>
    <div class="container">
        <h2>Iniciar sesion</h2><br>
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <div class="form-element">
                <input type="text" name="username" placeholder="Usuario" value="<?php if (isset($username)) echo $username; ?>" required />
            </div>
            <div class="form-element">
                <input id="password" type="password" name="password" placeholder="contraseña" required />
            </div>
             <div id="caja_checkbox">
                    <input type="checkbox" name="verContraseña" id="verContraseña">
                    <label for="verContraseña" id="verContraseñaLabel">Mostrar contraseña</label>
            </div>
            <div>
                <button type="submit"  name="register" value="register">Entrar</button>
                <a class="enlaceRegistro" href="registro.php">¿No tienes cuenta?</a>
            </div>
        </form>
    </div>
</body>
<script>
    {
        document.getElementById("verContraseña").addEventListener("click", function () {

            var pw = document.getElementById("password");
            if (pw.type == "password") {
                pw.type = "text";
            } else {
                pw.type = "password";
            }
        });
    }
</script>

</html>