<?php

$numTarjeta = 1234567891123456;
function enmascararTarjeta($numTarjeta) {
    $numTarjeta = (string) $numTarjeta;
    
   $asteriscos = str_repeat("*",strlen($numTarjeta-4));
   
    $numeros =  substr($numTarjeta,12,15);
   echo $asteriscos . $numeros;


}


enmascararTarjeta($numTarjeta)
?>