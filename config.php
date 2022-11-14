<?php 

    function conect(){
        try {
            $conexion = new mysqli('localhost', 'root', '','juego_palabras');
        } catch (Exception $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }

        return $conexion;
    }
    


?>