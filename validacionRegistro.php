<?php
    include("config.php");
    
    
    function validacionUser($variable){
        try {
            $conexion = new mysqli('localhost', 'root', '','juego_palabras');
        } catch (Exception $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
        $sentencia = $conexion->query("SELECT usuario FROM usuarios");
        $usuarios=[];
       
       foreach($sentencia as $fila){
           foreach($fila as $dato){
               $usuarios[] = $dato;
           }
   
       }

       for($i = 0; $i < count($usuarios); $i++){
            if($variable == $usuarios[$i]){
                echo "Ya existe este usuario. Por favor elige uno nuevo" . "<br>";
                return false;
            }
       }
       return true;
    }

    function validacionContraseñas($variable1, $variable2){
        if(strcmp($variable1, $variable2) == 0){
            return true;
        }else{
            echo "Las contraseñas deben de ser iguales" . "<br>";
            return false;
        }
        
    }
    function validacionNombre($variable){
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789´";
        if((strlen($variable) < 3 || strlen($variable) > 30)){
            echo "El nombre debe tener entre 3 y 30 caracteres"  . "<br>";
            return false;
        }else{
            for ($i=0; $i<strlen($variable); $i++){
                if (strpos($permitidos, substr($variable,$i,1))===false){
                    return false;
                }
            }
            return true;
        }
        
    }

    function validacionApellido($variable){
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789´";
        if((strlen($variable) < 3 || strlen($variable) > 30)){
            echo "El nombre debe tener entre 3 y 30 caracteres"  . "<br>";
            return false;
        }else{
            for ($i=0; $i<strlen($variable); $i++){
                if (strpos($permitidos, substr($variable,$i,1))===false){
                    return false;
                }
            }
            return true;
        }
        
    }

?>