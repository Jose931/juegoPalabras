<?php


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



?>