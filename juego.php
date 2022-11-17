<?php

include('funcionesJuego.php');


if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
    header("Location:login.php");
    
}else{
    echo "<p>Hola " . $_SESSION['nombreUser'] ."<p>" ."<br>";
}



$palabrasEncadenadas = [];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/juego.css">
    <title>Document</title>
</head>
<body>
    <div class="">
        <!-- <h2>Palabras encadenadas: el juego consiste en hacer una cadena de palabras. 
            La maquina pondra una palabra por defecto, por ejemplo “casa”, y tienes que 
            decir otra palabra que empiece por las dos ultimas letras de la palabra dicha, 
            siguiendo con el ejemplo “sapo”, “posada”, “dama”, y así sucesivamente. Si aciertas 
            se te sumaran cinco puntos. Tendras tres oprtunidades para fallar. Por cada fallo se restaran 
            dos puntos. Suerte!
        </h2> -->
    </div>
    <div>

    </div>    
    <div >
        <div>
            <h2>
                <?php
                   if(!isset($_POST['comprobarPalabra']) && $_SESSION['primeraPalabra']) {
                    $_SESSION['primeraPalabra'] = false;
                    $palabra = generarPalabra();
                    $_SESSION['palabra'][] = $palabra;
                    $_SESSION['palabrasAcertadas'][] = $_SESSION['palabra'][0]; 
                    echo "La primera palabra es: " .$_SESSION['palabra'][0];
                    }else{
                        if(!empty($_POST['palabraUsuario'])){
                            $_SESSION['palabraIntroducida'] = $_POST['palabraUsuario'];

                            if(existePalabra() && compararPalabras() && palabraUsada()){
                                $_SESSION['palabrasAcertadas'][] = $_SESSION['palabraIntroducida'];
                                echo "Has acertado con " . $_SESSION['palabraIntroducida'];
                            }
                             mostrarPalabras($_SESSION['palabrasAcertadas']);
                        }else{
                            echo "Tienes que escribir la palabra.<br>";

                        }

                        
                       
                    }
                ?>
            </h2>
        </div>
        <div>
            <p></p>
        </div>
        <div>
            <form  method='POST'>
                <input type="text" name='palabraUsuario' placeholder="escribe aqui">
                <input class="enviar" type="submit" id="comprobarPalabra" name="comprobarPalabra">
            </form>
        </div>
    </div>

    
    <div class="logout">
        <a href="logout.php" >Cerrar sesion</a>
    </div>
</body>
</html>