<?php
$num1 = 4;
$num2 = 40;
$array0 = [1, 2, 3, 4];
function esPar(int $num): bool
{

    if ($num % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function arrayAleatorio(int $tam, int $min, int $max): array
{
    $arrayAlea = [];
    for ($i = 0; $i = $tam; $i++) {
        $arrayAlea[$i] = rand($min, $max);
    }

    return $arrayAlea;
}

function arrayPares(array &$array1): int
{
    $contador  = 0;
    foreach ($array1 as $numero) {
        if ($numero % 2 == 0) {
            $contador++;
        } else {
            continue;
        }
    }
    return $contador;
}
