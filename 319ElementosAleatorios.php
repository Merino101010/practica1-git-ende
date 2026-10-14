<?php
$letras = [];

for ($i = 0; $i < 100; $i++) {
    $numeroRandom = random_int(1, 2);
    if ($numeroRandom === 2) {
        $letras[$i] = "F";
    } else {
        $letras[$i] = "M";
    }
}

print_r($letras);


$contadorF = 0;
$contadorM = 0;

for ($j = 0; $j < count($letras); $j++) {
    if ($letras[$j] === "F") {
        $contadorF++;
    }
    if ($letras[$j] === "M") {
        $contadorM++;
    }
}



echo "Hay $contadorF letras F y $contadorM letras M";
