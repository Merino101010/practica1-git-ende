<?php
$claves = ["Alvaro" => "alvaro", "Miguel" => 122];
$comprobador = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {




    $user = $_POST["usuario"];
    $pass = $_POST["contrasena"];

    foreach ($claves as $clave => $valor) {
        if ($user === $clave &&  $pass == $valor) {
            $comprobador = true;
            echo "<p>Accediendo</p>";
            break;
        } else {
            continue;
        }
    }
    if ($comprobador === false) {
        echo "<p>Error user or password incorrect</p>";
    }
}
