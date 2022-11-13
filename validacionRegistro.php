<?php



    function validacionUser($variable){
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i=0; $i<strlen($variable); $i++){
        if (strpos($permitidos, substr($variable,$i,1))===false){
            return false;
        }
    }
    return true;
    }

    function validacionContraseñas($variable1, $variable2){
        if(strcmp($variable1, $variable2) == 0){
            return true;
        }
        return false;
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