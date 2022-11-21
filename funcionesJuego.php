<?php
session_start();
$_SESSION['primeraPalabra'] = true;


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
    $conexion->close();
}

function existePalabra(){
   
    $palabraValidar = $_SESSION['palabraIntroducida'];
       
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
                return true;
            }
        }
        echo "<p>Tu palabra no existe o no la tenemos en nuestro registro. Se te restan 2pt!" . "</p>";

        return false;
    }catch(Exception $e){
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }
    $conexion->close();
}


function compararPalabras(){
    
    $palabraArray = $_SESSION['palabrasAcertadas'][count($_SESSION['palabrasAcertadas']) - 1];
    $palabraValidar = $_SESSION['palabraIntroducida'];
    if(substr($palabraArray, -2, 2) == substr($palabraValidar, 0, 2)){
        return true;
    }
    echo "<p>No es una palabra enlazada. Se te restan 2pt!" . "</p>";
    return false;
}

function palabraUsada(){
    $palabrasAcertadas = $_SESSION['palabrasAcertadas'];
    $palabraVer = $_SESSION['palabraIntroducida'];
    if(in_array($palabraVer, $palabrasAcertadas)){
        echo "<p>Palabra usada. No puedes repetir palabras. Se te restan 2pt!" . "</p>";
        return false;
    }
    return true;

}

function mostrarPalabras($variable){
    echo "<p>Tus palabras encadenadas son: ";
    for($i = 0;$i < count($variable); $i++){
        echo  $variable[$i] . " => ";
    }
    echo "</p>";
}

function insertarPuntosBd(){
    try{
        $puntuacion = $_SESSION['puntuacion'];
        $conexion = new mysqli('localhost', 'root', '','juego_palabras');
        $usuarioJugando = $_SESSION['nombreUser'];
        $buscarPuntuacion = $conexion->query("SELECT puntos from jugadores where usuario = '$usuarioJugando'");
        foreach($buscarPuntuacion as $fila){
            $puntuacionTabla = $fila['puntos'];
        }
        echo "<p>Tu puntuacion era de: " . $puntuacionTabla . "</p>";
        $puntuacionTotal = $puntuacion + $puntuacionTabla;
        $conexion->query("UPDATE jugadores set puntos = $puntuacionTotal where usuario = '$usuarioJugando'");
    }catch (Exception $e){
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
    $conexion->close();
}

function puntosTotales(){
    try {
        $conexion = new mysqli('localhost', 'root', '','juego_palabras');
        $usuarioJugando = $_SESSION['nombreUser'];
        $buscarPuntuacion = $conexion->query("SELECT puntos from jugadores where usuario = '$usuarioJugando'");
        foreach($buscarPuntuacion as $fila){
                $puntuacion = $fila['puntos'];

        }
        return $puntuacion;
    } catch (Exception $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
    $conexion->close();
}

function ranking(){
    try{
    $conexion = new mysqli('localhost', 'root', '','juego_palabras'); 
    $rankingUsuarios = [];
    $sacarRanking = $conexion->query("SELECT usuario, puntos from jugadores  ORDER BY puntos DESC LIMIT 3");
    
    foreach($sacarRanking as $fila){
        $rankingUsuarios[] = [$fila['usuario'] => $fila['puntos']];  
    }
    return $rankingUsuarios;
    }catch (Exception $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
    $conexion->close();
}
function imprimirRanking($rankingIm){
    echo"<div>";
    foreach($rankingIm as $key => $value){
        echo "<p>";
        foreach($value as $key2 => $value2){
            echo $key2 . " : " . $value2 . " px";
        }
        echo "</p>";
    }
    echo "</div>";
}

function crearCookie($numPartidas){
    setcookie('partidas', $numPartidas , time()+3600, '/');
}
?>