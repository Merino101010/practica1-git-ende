<?php


function mayor(): int
{
    $numeroMayor = 0;
    $numeros = func_get_args();

    foreach ($numeros as $numero) {

        if ($numero > $numeroMayor) {
            $numeroMayor = $numero;
        } else {
            continue;
        }
    }

    return $numeroMayor;
}

echo mayor(4, 2, 1);

function concatenar(...$palabras): string
{
    $frase = "";
    foreach ($palabras as $palabra) {
        $frase = $frase . $palabra . " ";
    }


    return $frase;
}

$nombre = "Alvaro";
$apellido = "Merino";
$edad = 19;

echo "\n" . concatenar($nombre, $apellido, $edad);
