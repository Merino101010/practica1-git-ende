<?php

$frase = "Vaya jodienda es esto, joe";
 
function censurarPalabras($frase){

 $listaProhibidas = ["Jodienda", "Joe"];
 $censura = "CENSURA";
 $blanco = " ";
 $contador = 0;
 $frases= str_ireplace($listaProhibidas,$censura ,$frase);
 $total_palabras = explode(" ",$frases);


 $total = count($total_palabras);

    
 
 

 echo $frases . "el total de palabras es ". $total;
 

 return $frases;
    
}


censurarPalabras($frase);


?>