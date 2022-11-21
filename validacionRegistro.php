<?php

        
    function validacionUser($variable){
        try {
            $conexion = new mysqli('localhost', 'root', '','juego_palabras');
            $sentencia = $conexion->query("SELECT usuario FROM usuarios");
            $usuarios=[];

            foreach($sentencia as $fila){
                foreach($fila as $dato){
                    $usuarios[] = $dato;
                }

            }

            for($i = 0; $i < count($usuarios); $i++){
                    if($variable == $usuarios[$i]){
                        echo "<div class='mensaje'>";
                        echo "<p>Ya existe este usuario. Por favor elige uno nuevo<p>";
                        echo "</div>";
                        return false;
                    }
            }
            return true;
        } catch (Exception $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
        $conexion->close();
        
    }
        
    

    function validacionContraseñas($variable1, $variable2){
        if($variable1 == $variable2){
            return true;
        }else{
            echo "<div class='mensaje'>";
            echo "<p>Las contraseñas deben de ser iguales</p>";
            echo "</div>";
            return false;
        }
        
    }
    
?>