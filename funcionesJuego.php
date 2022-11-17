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



?>