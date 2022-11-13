<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
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
    <title>Tu Juego de Palablas</title>
</head>
<body>
    <div class="container">
        <h2>Iniciar sesion</h2><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="signup-form">
            <div class="form-element">
                <input type="text" name="username" placeholder="Usuario" value="<?php if (isset($username)) echo $username; ?>" required />
            </div>
            <div class="form-element">
                <input type="password" name="password" placeholder="contraseña" required />
            </div>
            <div>
                <button type="submit"  name="register" value="register">Entrar</button>
                <a class="enlaceRegistro" href="registro.php">¿No tienes cuenta?</a>
            </div>
        </form>
    </div>
</body>
</html>