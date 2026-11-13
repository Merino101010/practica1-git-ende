<?php
// Datos de conexión (en un proyecto real, en un archivo fuera de htdocs)


$config = [

    'host'    => '127.0.0.1',

    'puerto'  => 3306,

    'bd'      => 'tienda_pdo',

    'usuario' => 'root',   // XAMPP trae root sin contraseña: solo para clase

    'clave'   => '',

];
$opciones = [

    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // error SQL = excepción

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // filas con claves por nombre

    PDO::ATTR_EMULATE_PREPARES   => false,                  // preparadas nativas del servidor

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

//$stmt->execute(['nombre' => "ProductoNuevo" , 'categoria'=>"Cables", 'precio' => 100, 'stock' =>30]);


echo $pdo->lastInsertId();


 

// 3) Intento clásico de inyección: se trata como un texto más, no como SQL

//$stmt->execute(['categoria' => "' OR '1'='1", 'maximo' => 100000, 'minimo'>=10000]);

//echo 'Filas devueltas con la inyección: ' . count($stmt->fetchAll()) . "\n";


/*==============EJEMPLO 6 ================ */
// fetch(): devuelve UNA fila en cada llamada y false cuando no quedan

$stmt = $pdo->query('SELECT id, nombre, precio FROM productos ORDER BY id LIMIT 3');

while ($fila = $stmt->fetch()) {

    echo "#{$fila['id']} {$fila['nombre']} ({$fila['precio']} €)\n";

}

var_dump($stmt->fetch()); // ya no quedan filas

 

// fetchAll(PDO::FETCH_ASSOC): todas las filas en un array de arrays asociativos

echo "======fetch association arrays asociativos =====\n";
$sql = 'SELECT nombre, precio FROM productos ORDER BY id LIMIT 2';

$asociativas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

print_r($asociativas);

 

// fetchAll(PDO::FETCH_NUM): mismas filas, pero con índices 0, 1, 2...
echo "======fetch association con indices0,1,2 =====\n";

$numericas = $pdo->query($sql)->fetchAll(PDO::FETCH_NUM);

print_r($numericas);

echo "Primer producto: {$numericas[0][0]} a {$numericas[0][1]} €\n";




/*EJEMPLO 6 PRACTICAR FETCH ALLL*/

echo " fetchAll(PDO::FETCH_NUM) \n";
$sql = 'SELECT nombre, precio FROM productos ORDER BY id LIMIT 2';

$asociativas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($asociativas as $clave =>$valor) {

    echo "#{$clave} {$valor['nombre']} ({$valor['precio']} €)\n";

}



echo " fetchAll(PDO::FETCH_KEY_PAIR) \n";
$sql = 'SELECT ID, nombre FROM productos ';

$asociativas = $pdo->query($sql)->fetchAll(PDO::FETCH_KEY_PAIR);

var_dump($asociativas)  ;
/*Devuelve un array con clavaes indices y valores de los nombres ademas te dice los espacios que ocupa el string(caracteres y espacios) de cada nombre*/