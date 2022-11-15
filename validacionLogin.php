<?php

        function comprobarLogin($nombre, $contraseña, $consulta){
        while($registro = $consulta->fetch_assoc()){
       
                foreach ($registro as $campo => $value) {
                        $arrayUser[$campo] = $value;
                }
                if(($arrayUser['usuario'] == $nombre) && (password_verify($contraseña, $arrayUser['contraseña']))){
                            echo "<p class='correcto'>Credenciales validos</p>";
                }else{
                        echo "<p class='error'>Credenciales no validos</p>";
                }
        }
        }
    
?>