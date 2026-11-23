<?php

/*------OJO EXAMEN---------------------------------------------------------------------------------------------------------------------------------    */

$palabras = ["ana", "adriana", "oro", "plata", "oso", "gato", "radar", "coche", "reconocer", "ruta"];

/*HACERLO LGO MANUALMENTE SIN FUNCION strrev*/


$contador = 0;
foreach ($palabras as $clave) {

    if ($clave == strrev($clave)) {
        $contador++;
    } else {
    }
}
echo "hay $contador de palabras palíndromas \n";

$contador2 = 0;

foreach ($palabras as $palabraInicio) {
    $longitudPalabra = strlen($palabraInicio);

    $contador2++;

    /*$longitudPalabra/2 pq solo necesitamos llegar a mitad de palabra pa saber si es políndroma*/
    /*COMPARO LETRASR*/
    for ($n = 0; $n < $longitudPalabra / 2; $n++) {
        //en el if paso la palabra como si fuese un array y voy carcter a caracter comparandolo con el final de la otra mitad de la palabra (-1 porque el bucle empieza en 0)
        if ($palabraInicio[$n] === $palabraInicio[$longitudPalabra - 1 - $n]) {
            // Si una sola letra NO coincide, restamos el 1 que sumamos antes
        } else {

            $contador2--;
            break;
        }
    }
}
echo "hay $contador2 de palabras palíndromas";
