<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'] ?? '';

    $edad   = filter_var($_POST['edad'] ?? '', FILTER_VALIDATE_INT);



    if ($edad === false) {

        echo "<p>La edad no es un número entero.</p>\n";
    } else {

        echo "<p>Hola, $nombre. Tienes $edad años.</p>\n";
    }

    echo '<p>El campo edad llega como tipo: ' . gettype($_POST['edad'] ?? null) . "</p>\n";
} else {

    echo "<p>Esta página procesa un formulario. Rellénalo en <a href=\"ejemplo1.html\">ejemplo1.html</a>.</p>\n";
}



$busqueda = $_GET['q'] ?? '(sin búsqueda)';

echo "<p>Recibido por GET: q = $busqueda</p>\n";

echo '<p>Datos GET dentro de la URL: ?' . http_build_query($_GET) . "</p>\n";
