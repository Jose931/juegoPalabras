<?php

include('funcionesJuego.php');
require('config.php');

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/juego.css">
    <title>Palabras Encadenadas</title>
</head>

<body>
    <p class='usuario'>Hola <?php echo $_SESSION['nombreUser'] ?></p>
    <div class="general">
        <div class="parrafo">
            <p class="juego">Palabras encadenadas: el juego consiste en hacer una cadena de palabras.
                La maquina pondra una palabra por defecto, por ejemplo “casa”, y tienes que
                decir otra palabra que empiece por las dos ultimas letras de la palabra dicha,
                siguiendo con el ejemplo “sapo”, “posada”, “dama”, y así sucesivamente. No se podran repetir las palabras. Si aciertas
                se te sumaran cinco puntos. Tendras tres oprtunidades para fallar. Por cada fallo se restaran
                dos puntos. Suerte!
            </p>
        </div>
        <div class="centro">
            <?php
            if (!isset($_POST['comprobarPalabra']) && $_SESSION['primeraPalabra']) {
                $_SESSION['primeraPalabra'] = false;
                $_SESSION['puntuacion'] = 0;
                $_SESSION['intentos'] = 3;
                $palabra = generarPalabra();
                $_SESSION['palabra'][] = $palabra;
                $_SESSION['palabrasAcertadas'][] = $_SESSION['palabra'][0];
                echo "<div class='informacion'>";
                echo "<p class= 'juego'>Intentos: " . $_SESSION['intentos'] . "</p>";
                echo "<p>Puntuación: " . $_SESSION['puntuacion'] . "</p>";
                echo "<p>Partida en sesion: " . $_COOKIE['partidas'] . "</p>";
                echo "<p>La primera palabra es: " . $_SESSION['palabra'][0] . "</p>";
                echo "</div>";
                echo "<div>
                        <form method='POST'>
                            <input  type='text' name='palabraUsuario' placeholder='escribe aqui'>
                            <input class='enviar' type='submit' id='comprobarPalabra' name='comprobarPalabra'>
                        </form>
                    </div>";
            } else {
                if ($_SESSION['intentos'] > 1) {
                    if (!empty($_POST['palabraUsuario'])) {
                        $_SESSION['palabraIntroducida'] = $_POST['palabraUsuario'];
                        echo "<div class='informacion'>";
                        if (existePalabra() && compararPalabras() && palabraUsada()) {
                            $_SESSION['palabrasAcertadas'][] = $_SESSION['palabraIntroducida'];
                            $_SESSION['puntuacion'] += 5;

                            echo "<p>Has acertado con " . $_SESSION['palabraIntroducida'] . ". Se  te suman 5pt!" . "</p>";
                            echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
                            echo "<p>Puntuación: " . $_SESSION['puntuacion'] . "</p>";
                            echo "<p>Partida en sesion: " . $_COOKIE['partidas'] . "</p>";
                        } else {
                            $_SESSION['puntuacion'] -= 2;
                            $_SESSION['intentos']--;
                            echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
                            echo "<p>Puntuación: " . $_SESSION['puntuacion'] . "</p>";
                            echo "<p>Partida en sesion: " . $_COOKIE['partidas'] . "</p>";
                        }
                        mostrarPalabras($_SESSION['palabrasAcertadas']);
                        echo "</div>";
                        echo "<div>
                                <form method='POST'>
                                    <input  type='text' name='palabraUsuario' placeholder='escribe aqui'>
                                    <input class='enviar' type='submit' id='comprobarPalabra' name='comprobarPalabra'>
                                </form>
                            </div>";
                    } else {
                        echo "<div class='informacion'>";
                        echo "<p>Tienes que escribir la palabra.</p>";
                        echo "<p>Intentos: " . $_SESSION['intentos'] . "</p>";
                        echo "<p>Puntuación: " . $_SESSION['puntuacion'] . "</p>";
                        echo "<p>Partida en sesion: " . $_COOKIE['partidas'] . "</p>";
                        mostrarPalabras($_SESSION['palabrasAcertadas']);
                        echo "</div>";
                        echo "<div>
                                <form method='POST'>
                                    <input  type='text' name='palabraUsuario' placeholder='escribe aqui'>
                                    <input class='enviar' type='submit' id='comprobarPalabra' name='comprobarPalabra'>
                                </form>
                            </div>";
                    }
                } else {
                    echo "<div class='informacion'>";
                    echo "<p>Has perdido! Tu puntuacion en la partida es de " . $_SESSION['puntuacion'] . "</p>";
                    insertarPuntosBd();
                    $puntuacionGlobal = puntosTotales();
                    echo "<p>Tu puntuacion global es de: " . $puntuacionGlobal . "</p>";
                    $ranking = ranking();
                    echo "<p>Los tres mejores son: </p>";
                    imprimirRanking($ranking);
                    echo "</div >";
                    echo "<div>";
                    echo "<form  method='POST'>
                                        <input type='submit' id='volverJugar' name='volverJugar' value='¿Volver a jugar?'>
                                    </form>";
                    echo "</div>";
                    if ($_SERVER["REQUEST_METHOD"] = "POST") {
                        $_SESSION['primeraPalabra'] = true;
                        unset($_SESSION['palabrasAcertadas']);
                        unset($_SESSION['palabra']);
                        $_SESSION['partida'] += 1;
                        crearCookie($_SESSION['partida']);
                    }
                }
            }
            ?>

        </div>
        <div class="logout">
            <a href="logout.php">Cerrar sesion</a>
        </div>
    </div>



</body>

</html>