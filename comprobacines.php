<?php
    function existePalabra(){
        
            // $palabraValidar = $_POST['palabraUsuario'];
            // $_SESSION['palabraValidar'] = strtolower($palabraValidar);
            $palabraValidar = 'jamon';
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
                        echo "valida base de datos. ";
                        return true;
                    }
                }
                echo "no valida base de datos. ";
                return false;
            }catch(Exception $e){
                echo "Error al conectar con la base de datos: " . $e->getMessage();
            }
    }
    $existe = existePalabra();
    echo "Existe la palabra?: " . $existe . "<br>";

    function compararPalabras(){
        $palabra = 'naranja';
        $palabraValidar = 'jamon';
        if(substr($palabra, -2, 2) == substr($palabraValidar, 0, 2)){
            echo "valida comparacion ";
            return true;
        }
        echo "no valida comparacion ";
        return false;
    }

    $valida = compararPalabras();
    echo "Vale la palabra?: " . $valida;
?>