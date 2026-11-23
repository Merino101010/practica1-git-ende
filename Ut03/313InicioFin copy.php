<?php
echo "<h1>Calculo de suma en un bucle inicio fin</h1>";

if (isset($_POST["numeroInicial"]) && isset($_POST["numeroFinal"])) {
    $numI = intval($_POST["numeroInicial"]);
    $numF = intval($_POST["numeroFinal"]);
    $resultado = 0;

    for ($i = $numI; $i <= $numF; $i++) {
        $resultado = $resultado + $i;
    }

    echo "<p>La suma total desde el número <strong>$numI</strong> hasta el <strong>$numF</strong> es:</p>";
    echo "<h2>$resultado</h2>";
} else {
    echo "<p>Introduce números en el formulario.</p>";
}
