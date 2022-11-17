<?php

session_start();
if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
    header("Location:login.php");
    
}else{
    echo "<p>Hola " . $_SESSION['nombreUser'] ."<p>" ."<br>";
}

function generarPalabra(){
    try {
        $conexion = new mysqli('localhost', 'root', '','juego_palabras');
        $numeroPalabra = random_int(0,77);
        $consulta = $conexion->query("SELECT nombre_palabra FROM palabras where id_palabra = $numeroPalabra");
        
        foreach($consulta as $fila){
            $palabra = $fila['nombre_palabra'];
        }

        return $palabra;
        


    } catch (Exception $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
}

function existePalabra(){
    if(isset($_POST['comprobarPalabra'])){
        $palabraValidar = $_POST['palabraUsuario'];
        $_SESSION['palabraValidar'] = strtolower($palabraValidar);
        try{
            $conexion = new mysqli('localhost', 'root', '','juego_palabras');
            $consulta = $conexion->query("SELECT nombre_palabra from palabras");
            $palabras = [];

            foreach($consulta as $fila){
                foreach($fila as $dato){
                    $palabras[] = $dato;
                }
            }

            for($i = 0; $i < count($palabras); $i++){
                if($palabraValidar == $palabras[$i]){
                    echo "valida base de datos.";
                    return true;
                }
            }
            echo "no valida base de datos.";
            return false;
        }catch(Exception $e){
            echo "Error al conectar con la base de datos: " . $e->getMessage();
        }
    }
}

function compararPalabras(){
    $palabra = $_SESSION['palabra'];
    $palabraValidar = $_SESSION['palabraValidar'];
    if(substr($palabra, -2, 2) == substr($palabraValidar, 0, 2)){
        echo "valida comparacion";
        return true;
    }
    echo "no valida comparacion";
    return false;
}

function palabraCorrecta(){
    if(existePalabra() && compararPalabras()){
        echo "La palabra " . $_SESSION['palabraValidar'] . " es correcta.";
    }
}
if(isset($_POST['comprobarPalabra'])){
    echo $_SESSION['palabraValidar'];
}




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
        <h2>Palabras encadenadas: el juego consiste en hacer una cadena de palabras. 
            La maquina pondra una palabra por defecto, por ejemplo “casa”, y tienes que 
            decir otra palabra que empiece por las dos ultimas letras de la palabra dicha, 
            siguiendo con el ejemplo “sapo”, “posada”, “dama”, y así sucesivamente. Si aciertas 
            se te sumaran dos puntos. Tendras tres oprtunidades para fallar. Por cada fallo se restaran 
            dos puntos. Suerte!
        </h2>
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
                    }
            
                ?>
            </p>
        </div>
        <div>
            <p>
                <?php
                    if(isset($_POST['comprobarPalabra'])){
                        $exite = existePalabra();
                        $valida = compararPalabras();
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
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method=POS>
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