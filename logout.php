<?php
    session_start();
    session_destroy();
    unset($_COOKIE['partida']);
    header("Location:login.php");
?>