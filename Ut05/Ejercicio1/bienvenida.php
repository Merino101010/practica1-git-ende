<?php
header("Content-Type: text/html; charset=utf-8");
if (isset($_POST['olvidar'])) {
    setcookie('visitante', '', time() - 3600, '/');
    header('Location: bienvenida.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreVisitante = $_POST["nombre"] ?? 'Invitado'; /*PEdir nombre*/
    $visitante = $_COOKIE['visitante'] ?? $nombreVisitante;
    $caduca = time() + (7 * 24 * 3600);
    setcookie('visitante', $visitante, $caduca, '/');
    header('Location: bienvenida.php');
    exit;
}



if (isset($_COOKIE['visitante'])) {
    $visitante = $_COOKIE['visitante'];
    echo "<p>Visita {$visitante}<p>";
} else {
    include 'bienvenida.php';
};
