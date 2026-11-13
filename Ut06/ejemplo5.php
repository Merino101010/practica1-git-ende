<?php
// Datos de conexión (en un proyecto real, en un archivo fuera de htdocs)


$config = [

    'host'    => '127.0.0.1',

    'puerto'  => 3306,

    'bd'      => 'tienda_pdo',

    'usuario' => 'root',   // XAMPP trae root sin contraseña: solo para clase

    'clave'   => '',

];

$dsn = "mysql:host={$config['host']};port={$config['puerto']};"

     . "dbname={$config['bd']};charset=utf8mb4";

 

$opciones = [

    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // error SQL = excepción

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // filas con claves por nombre

    PDO::ATTR_EMULATE_PREPARES   => false,                  // preparadas nativas del servidor

];

 

try {

    $pdo = new PDO($dsn, $config['usuario'], $config['clave'], $opciones);

} catch (PDOException $e) {

    error_log($e->getMessage());                      // detalle al log

    exit("No se pudo conectar con la base de datos.\n"); // mensaje neutro

}

 

// Comparación: misma consulta con una conexión SIN opciones y con opciones

$sinOpciones = new PDO($dsn, $config['usuario'], $config['clave']);

echo "Sin opciones (FETCH_BOTH por defecto):\n";

print_r($sinOpciones->query('SELECT id, nombre FROM productos WHERE id = 1')->fetch());

echo "Con FETCH_ASSOC:\n";

print_r($pdo->query('SELECT id, nombre FROM productos WHERE id = 1')->fetch());

 

// ERRMODE_EXCEPTION: un fallo SQL se puede capturar con try-catch

try {

    $pdo->query('SELECT * FROM tabla_que_no_existe');

} catch (PDOException $e) {

    echo 'Excepción capturada. SQLSTATE: ' . $e->getCode() . "\n";

}
// El valor llegaría del formulario; en consola usamos uno por defecto

$categoria = $_GET['categoria'] ?? 'Periféricos';

 

// 1) prepare(): el servidor recibe la consulta con marcadores, sin datos

$stmt = $pdo->prepare(

    'SELECT nombre, precio FROM productos

     WHERE categoria = :categoria AND precio <= :maximo AND precio >= :minimo

     ORDER BY precio'

);

// 2) execute(): los valores se envían por separado y nunca se mezclan con el SQL

$stmt->execute(['categoria' => $categoria, 'maximo' => 100, 'minimo' => 20]);

foreach ($stmt as $fila) {

    echo "{$fila['nombre']}: {$fila['precio']} €\n";

}

$stmt = $pdo->prepare(
    'INSERT INTO productos (nombre, categoria , precio , stock )  VALUES(:nombre , :categoria , :precio , :stock) '
) ;

$stmt->execute(['nombre' => "ProductoNuevo" , 'categoria'=>"Cables", 'precio' => 100, 'stock' =>30]);





 

// 3) Intento clásico de inyección: se trata como un texto más, no como SQL

//$stmt->execute(['categoria' => "' OR '1'='1", 'maximo' => 100000, 'minimo'>=10000]);

//echo 'Filas devueltas con la inyección: ' . count($stmt->fetchAll()) . "\n";