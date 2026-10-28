<?php
header("Content-Type: text/html; charset=utf-8");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreVisitante = $_POST["nombre"] ?? 'Invitado'; /*PEdir nombre*/
    $visitante = $_COOKIE['visitante'] ?? $nombreVisitante;
    $caduca = time() + (7 * 24 * 3600);
    setcookie('visitante', $visitante, $caduca);
    echo "<p>Visita {$visitante}<p>";
    echo "<p>Ha llegado<p>";
    header('location: bienvenida.php');
}

if (isset($_POST['olvidar'])) {
}

echo "<p>Visita {$visitante}<p>";
echo "<p>Ha llegado<p>";
exit;
