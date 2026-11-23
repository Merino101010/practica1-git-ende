<?php
require_once 'Biblioteca.php';

$ok = 0; $fallos = 0;
function prueba(string $descripcion, bool $condicion): void
{
    global $ok, $fallos;
    if ($condicion) { $ok++; echo "  [OK]    $descripcion\n"; }
    else            { $fallos++; echo "  [FALLO] $descripcion\n"; }
}
// Devuelve el mensaje de la excepción, o null si NO se lanzó ninguna
function error(callable $accion): ?string
{
    try { $accion(); return null; }
    catch (Exception $e) { return $e->getMessage(); }
}


$b = new Biblioteca('BiblioTeca');

echo "== 1. Altas ==\n";
$b->incluirLibro('Quijote', 20.00, 1200);     // código 1
$b->incluirLibro('azul', 12.50, 300);         // código 2
$b->incluirRevista('Hola', 3.00, 15);         // código 3
$b->incluirRevista('National', 6.50, 210);    // código 4
$b->incluirSocio('Ana');                      // ID 1, cupo 2 por defecto
$b->incluirSocio('Luis', 1);                  // ID 2, cupo 1
$docs = $b->ordenarPorPrecio();
prueba('hay 4 documentos', count($docs) === 4);
prueba('el array ordenado se numera desde 0', array_keys($docs) === [0, 1, 2, 3]);
$codigos = array_map(fn($d) => $d->getCodigo(), $docs); sort($codigos);
prueba('los códigos son 1,2,3,4 (automáticos)', $codigos === [1, 2, 3, 4]);

echo "\n== 2. Ordenar ==\n";




       

echo "\n== 3. Préstamos correctos ==\n";
prueba('Ana toma el 1', error(fn() => $b->prestarDocumento(1, 1)) === null);
prueba('Ana toma el 2', error(fn() => $b->prestarDocumento(1, 2)) === null);

echo "\n== 4. Errores (se imprime el mensaje de cada uno) ==\n";
$casos = [
    'ya lo tiene (Ana pide el 1 otra vez)'        => fn() => $b->prestarDocumento(1, 1),
    'cupo (Ana ya tiene 2 y pide el 3)'           => fn() => $b->prestarDocumento(1, 3),
    'lo tiene otro socio (Luis pide el 1)'        => fn() => $b->prestarDocumento(2, 1),
    'socio inexistente (ID 9)'                    => fn() => $b->prestarDocumento(9, 3),
    'documento inexistente (código 99)'           => fn() => $b->prestarDocumento(2, 99),
    'devolver algo que no tiene (Luis devuelve 1)'=> fn() => $b->devolverDocumento(2, 1),
    'devolver con socio inexistente (ID 9)'       => fn() => $b->devolverDocumento(9, 1),
];
foreach ($casos as $nombre => $accion) {
    $msg = error($accion);
    prueba("lanza Exception: $nombre", $msg !== null);
    if ($msg !== null) echo "          mensaje: $msg\n";
}
$estados = array_map(fn($d) => $d->estaPrestado(), $b->ordenarPorPrecio());   // orden: 3,4,2,1
prueba('tras los errores nada cambió (3 y 4 siguen libres, 2 y 1 prestados)',
       $estados === [false, false, true, true]);

echo "\n== 5. Devolver y volver a prestar ==\n";
prueba('Ana devuelve el 1', error(fn() => $b->devolverDocumento(1, 1)) === null);
prueba('Luis ya puede tomar el 1', error(fn() => $b->prestarDocumento(2, 1)) === null);
prueba('Luis (cupo 1) no puede tomar otro', error(fn() => $b->prestarDocumento(2, 3)) !== null);

echo "\n== 6. Renovables (instanceof) ==\n";
$r = $b->renovables();
prueba('solo hay 2 renovables (los libros)', count($r) === 2);
$todosRenovables = true; foreach ($r as $d) { if (!($d instanceof Renovable)) $todosRenovables = false; }
prueba('todos implementan Renovable', $todosRenovables);
foreach ($r as $d) {
    if ($d->getTitulo() === 'Quijote') {
        prueba('multa del Quijote a 3 días = 20 x 0,05 x 3 = 3.0', abs($d->renovar(3) - 3.0) < 0.001);
    }
}

echo "\n== 7. Listados (mira que el formato te guste) ==\n";
echo $b->listarDocumentos() . "\n";
echo $b->listarSocios() . "\n";

echo "RESULTADO: $ok OK, $fallos FALLO\n";