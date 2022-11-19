<?php
    
        
            // $palabraValidar = $_POST['palabraUsuario'];
            // $_SESSION['palabraValidar'] = strtolower($palabraValidar);
        
            try {
                $conexion = new mysqli('localhost', 'root', '','juego_palabras');
                $usuarioJugando = 'josele931';
                $buscarPuntuacion = $conexion->query("SELECT puntos from jugadores where usuario = '$usuarioJugando'");
                foreach($buscarPuntuacion as $fila){
                        
                        $puntuacion = $fila['puntos'];
                        
                }

                echo $puntuacion;
                
            } catch (Exception $e) {
                echo 'Error con la base de datos: ' . $e->getMessage();
            }
        
        
        
            
?>