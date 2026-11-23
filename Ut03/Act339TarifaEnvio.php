<?php

$zonas = ['Peninsula' => 1.0, 'Baleares' => 1.5, 'Canarias' =>  2, 0];

$tramos = [
    1 => 4.5,
    5 => 7.9,
    10 => 12.0,
    20 => 18.50
];

//$total = $tarifabase * $coefzona;
$total = 0;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $destino = $_POST["destino"] ?? " ";


    $pesoPaq = $_POST["peso"] ?? 0;

    foreach ($zonas as $zona => $precio) {

        foreach ($tramos as $peso => $tasa) {

            if ($zona === $destino) {
                if ($pesoPaq <= $tasa) {
                    $total = $precio * $tasa;
                    echo "<p>El total es $total  es la multiplicacion del $pesoPaq y la $tasa</p>";
                }
            }
        }
    }
}
