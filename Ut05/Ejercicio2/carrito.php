<?php
session_start();

$precio = [
    'pan' => 1,
    'Leche' => 1.25,
    'huevos' => 1.70
];


session_start();

$sesion = $_SESSION['carrito'] ?? [];

$productoAñadir = $_GET['add'] ?? ''; // url add para q se añada
if (isset($precio[$productoAñadir])) {
}
if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_name('CArrito');
}


echo "Cookie de sesion " . session_name();
