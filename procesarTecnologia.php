<?php

$listaString = "php, javascript, html, css, sql";

function procesarTecnologias($listaString) {
   
    $tecnologiasArray = explode(",", $listaString);
    
   
    $elementosProcesados = array_map(fn($item) => strtoupper(trim($item)), $tecnologiasArray);
    
  
    $resultadoFinal = implode(" - ", $elementosProcesados);
    
    return $resultadoFinal;
}


echo procesarTecnologias($listaString);


?>
