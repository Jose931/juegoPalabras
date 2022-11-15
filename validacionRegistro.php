<?php

        
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
        if($variable1 == $variable2){
            return true;
        }else{
            echo "Las contraseñas deben de ser iguales" . "<br>";
            return false;
        }
        
    }
    function validacionNombre($variable){
        $permitidos = "a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ´";
        $compr = explode(' ', $permitidos);
        if((strlen($variable) < 3 || strlen($variable) > 30)){
            echo "El nombre debe tener entre 3 y 30 caracteres"  . "<br>";
            return false;
        }else{
            for ($i=0; $i<strlen($variable); $i++){
                if (in_array(substr($variable, $i, 1), $compr)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        
    }

    function validacionApellido($variable){
        $permitidos = "a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ´";
        $compr = explode(' ', $permitidos);
        if((strlen($variable) < 3 || strlen($variable) > 30)){
            echo "El apellido debe tener entre 3 y 30 caracteres"  . "<br>";
            return false;
        }else{
            for ($i=0; $i<strlen($variable); $i++){
                if (in_array(substr($variable, $i, 1), $compr)){
                    return true;
                }else{
                    echo "Apellido mal escrito. No se pueden meter parametros extraños en nombre.";
                    return false;
                }
            }
        }
        
    }

?>