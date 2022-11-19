<?php 

    try {
        $conexion = new mysqli('localhost', 'root', '','juego_palabras');
    } catch (Exception $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }

?>