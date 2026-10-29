<?php
$productosPrecio = [
    'pan' => 1,
    'Leche' => 1.25,
    'huevos' => 1.70
];


session_start();

$_SESSION['carrito'];

if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_name('CArrito');
    session_start();
}


echo "Cookie de sesion " . session_name();
