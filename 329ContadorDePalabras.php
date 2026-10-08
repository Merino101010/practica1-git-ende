<?php
$frase = "Buenas tardes que tal";

$fraseMinusc = strtolower($frase);


$palabras = explode(" ", $fraseMinusc);
$palabras = array_filter($palabras);

$contador = array_count_values($palabras); //esto da un array asociativo
arsort($contador);

echo "<h2>Las 5 palabras más repetidas:</h2>";
echo "<ul>";

$i = 0;
foreach ($contador as $palabra => $frecuencia) {
    if ($i < 5) {
        echo "<li>$palabra: $frecuencia veces</li>";
        $i++;
    } else {
        break;
    }
}

echo "</ul>";
?>
