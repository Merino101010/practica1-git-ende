<?php
session_start();
$precios = ['pan' => 1.20, 'leche' => 0.95, 'huevos' => 2.40];
$sesion = $_SESSION['carrito'] ?? [];

echo "<h1>Carrito</h1>";
echo "<form method='post' action='5.2.2carrito.php'>
       <button name='cierreSesion'>Cerrar sesión</button>
     </form>";

$producto_a_anadir = $_GET['add'] ?? '';

if (isset($precios[$producto_a_anadir])) {

        if (isset($_SESSION['carrito'][$producto_a_anadir])) {
            $_SESSION['carrito'][$producto_a_anadir] += 1;
        } else {
            $_SESSION['carrito'][$producto_a_anadir] = 1;
        }
    }


$totalUnidades = 0;
foreach ($sesion as $producto => $unidades) {
    $totalUnidades+=$unidades;
    echo "<p>$producto x $unidades  " . "</p>";
}
 echo "<p>Productos en el carrito = {$totalUnidades}</p>";



/* Vaciar carrito */
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header('Location: 5.2.carrito.php'); 
    exit;
}

/* Cerrar sesión con el botón */
if(isset($_POST['cierreSesion'])){
    if (ini_get('session.use_cookies')) { 
            $p = session_get_cookie_params();
            setcookie(session_name(), '', [
                'expires'  => time() - 3600,
                'path'     => $p['path'],
                'domain'   => $p['domain'],
                'secure'   => $p['secure'],
                'httponly' => $p['httponly'],
                'samesite' => $p['samesite'],
            ]);
   }
 session_destroy();    
 header('Location: 5.2.2carrito.php'); 
 exit;               
}

