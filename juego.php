<?php

include("funcionesJuego.php");

session_start();
if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
    header("Location:login.php");
    
}else{
    echo "<p>Hola " . $_SESSION['nombreUser'] ."<p>" ."<br>";
}

$contador = 0;

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
            se te sumaran dos puntos. Tendras tres oprtunidades para fallar. Por cada fallo se restaran 
            dos puntos. Suerte!
        </h2> -->
    </div>
    <div>

    </div>    
    <div >
        <div>
            <p>
                <?php
                   if(!isset($_POST['comprobarPalabra'])){
                    $palabra = generarPalabra();
                    $_SESSION['palabra'] = $palabra;
                    echo "La primera palabra es: " . $palabra;
                    $palabrasEncadenadas[] = $palabra;
                    
                }
                ?>
            </p>
        </div>
        <div>
            <p>
                <?php
                    if(isset($_POST['comprobarPalabra'])){
                        echo "Entra en el bloque de codigo";
                        if(existePalabra() && compararPalabras()){
                            echo "Comprueba bien";
                        }else{
                            echo "Comprueba mal";
                        }
                        
                    }

                ?>

            </p>
        </div> 
        <div>
            <form  method=POS>
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