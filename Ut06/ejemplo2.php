<?php
// DSN de MySQL/MariaDB: prefijo "mysql:" y parámetros clave=valor separados por ";"

function dsnMysql(string $host, string $db, int $puerto = 3306): string

{

    // charset=utf8mb4 fija la codificación desde el primer byte de la conexión

    return "mysql:host=$host;port=$puerto;dbname=$db;charset=utf8mb4";

}

 

// DSN de PostgreSQL: prefijo "pgsql:"; la codificación se pasa con "options"

function dsnPgsql(string $host, string $db, int $puerto = 5432): string

{

    return "pgsql:host=$host;port=$puerto;dbname=$db;options='--client_encoding=UTF8'";

}

 

echo dsnMysql('127.0.0.1', 'tienda_pdo') . "\n";

echo dsnPgsql('127.0.0.1', 'tienda_pdo') . "\n";

 

// ¿Por qué utf8mb4? Cuenta los bytes que ocupa cada carácter en UTF-8

foreach (['a', 'ñ', '€', '😀'] as $caracter) {

    echo "'$caracter' ocupa " . strlen($caracter) . " byte(s)\n";

}