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
                echo "valida base de datos.";
                return true;
            }
        }
        echo "no valida base de datos." . "<br>";
        return false;
    }catch(Exception $e){
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }
}


function compararPalabras(){
    
    $palabraArray = $_SESSION['palabrasAcertadas'][count($_SESSION['palabrasAcertadas']) - 1];
    $palabraValidar = $_SESSION['palabraIntroducida'];
    echo $palabraArray . "<br>";
    if(substr($palabraArray, -2, 2) == substr($palabraValidar, 0, 2)){
        echo "valida comparacion" . "<br>";
        return true;
    }
    echo "no valida comparacion" . "<br>";
    return false;
}

function palabraUsada(){
    $palabrasAcertadas = $_SESSION['palabrasAcertadas'];
    $palabraVer = $_SESSION['palabraIntroducida'];
    if(in_array($palabraVer, $palabrasAcertadas)){
        echo "Palabra usada" . "<br>";
        return false;
    }
    echo "Palabra no usada" . "<br>";
    return true;

}

function mostrarPalabras($variable){
    print_r($variable);
}
?>