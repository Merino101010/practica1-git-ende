<?php

 $accion = "editar_perfil"; //Acciones esperadas: 'inicio.php', 'login.php', 'registro.php', 'editar_perfil.php', 'guardar_perfil.php'.

    switch($accion){
        case "inicio":
            echo "Cargar portada";
            break;
        case  "login":
        
            
        case     "registro":   
            
            echo "cargar formulario de accesso";
            break; 
        case  "editar_perfil"   :
           
        case     "guardar_perfil":
            echo "Modulo de gestión de usuario";
            break;    
        default:
            echo "HTTP 404 Página no encontrada";
            

    }
?>