<?php

 $accion = "editar_perfil"; //Acciones esperadas: 'inicio.php', 'login.php', 'registro.php', 'editar_perfil.php', 'guardar_perfil.php'.

    switch($accion){
        case $accion=="inicio":
            echo "Cargar portada";
            break;
        case $accion == "login" || $accion == "registro";
            echo "cargar formulario de accesso";
            break;
        case $accion == "editar_perfil" || $accion == "guardar_perfil";
            echo "Modulo de gestión de usuario";
            break;
        default:
            echo "HTTP 404 Página no encontrada";
        break;    

    }
?>