<?php
header("Content-Type: text/html; charset=utf-8");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreVisitante = $_POST["nombre"] ?? 'Invitado'; /*PEdir nombre*/
    $visitante = $_COOKIE['visitante'] ?? $nombreVisitante;
    $caduca = time() + (7 * 24 * 3600);
    setcookie('visitante', $visitante, $caduca);
    header('location: bienvenida.php');
    echo "<p>Visita nº visitas<p>";
    echo "<p>Ha llegado<p>";
    exit;
}
