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
            siguiendo con el ejemplo “sapo”, “posada”, “dama”, y así sucesivamente.No se podran repetir las palabras. Si aciertas 
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
                    $_SESSION['puntuacion'] = 0;
                    $_SESSION['intentos'] = 3;
                    $palabra = generarPalabra();
                    $_SESSION['palabra'][] = $palabra;
                    $_SESSION['palabrasAcertadas'][] = $_SESSION['palabra'][0];
                    echo "Intentos: " . $_SESSION['intentos'] . "<br>";
                    echo "Puntuación: " . $_SESSION['puntuacion'] . "<br>";  
                    echo "La primera palabra es: " .$_SESSION['palabra'][0];
                    }else{
                        if($_SESSION['intentos'] > 1){
                            if(!empty($_POST['palabraUsuario'])){
                                $_SESSION['palabraIntroducida'] = $_POST['palabraUsuario'];
    
                                if(existePalabra() && compararPalabras() && palabraUsada()){
                                    $_SESSION['palabrasAcertadas'][] = $_SESSION['palabraIntroducida'];
                                    $_SESSION['puntuacion'] += 5;
                                    echo "Has acertado con " . $_SESSION['palabraIntroducida'] .". Se  te suman 5ptx!" ."<br>";
                                    echo "Intentos: " . $_SESSION['intentos'] . "<br>";
                                    echo "Puntuación: " . $_SESSION['puntuacion'] . "<br>";
                                }else{
                                    $_SESSION['puntuacion'] -= 2;
                                    $_SESSION['intentos']--;
                                    echo "Intentos: " . $_SESSION['intentos'] . "<br>";
                                    echo "Puntuación: " . $_SESSION['puntuacion'] . "<br>";
                                }
                                 mostrarPalabras($_SESSION['palabrasAcertadas']);
                            }else{
                                echo "Tienes que escribir la palabra.<br>";
                                echo "Intentos: " . $_SESSION['intentos'] . "<br>";
                                echo "Puntuación: " . $_SESSION['puntuacion'] . "<br>"; 
                                mostrarPalabras($_SESSION['palabrasAcertadas']);
                            }   
                        }else{
                            echo "Has perdido! Tu puntuacion en la partida es de " . $_SESSION['puntuacion'];
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