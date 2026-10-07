<?php
$Libros = [
    "978-84-1234" => [
        "titulo"     => "El Quijote",
        "autor"      => "Cervantes",
        "ejemplares" => 5,
        "prestados"  => 2
    ],
    "978-84-5678" => [
        "titulo"     => "La Iliada",
        "autor"      => "Homero",
        "ejemplares" => 3,
        "prestados"  => 3
    ],
    "978-84-9012" => [
        "titulo"     => "1984",
        "autor"      => "George Orwell",
        "ejemplares" => 4,
        "prestados"  => 1
    ]
];

echo "<table border=1px black> \n";
echo "<tr>";
echo "<th>titulo</th>\n";
echo "<th>autor</th>\n";
echo "<th>ejemplares</th>\n";
echo "<th>prestados</th>\n";
echo "</tr>";
foreach ($Libros as $isbn => $datos) {

    if ($datos["ejemplares"] > $datos["prestados"]) {
        echo "<tr>";
        echo "<td>$datos[titulo]</td>";
        echo "<td>$datos[autor]</td>";
        echo "<td>$datos[ejemplares]</td>";
        echo "<td>$datos[prestados]</td>";
        echo "</tr>";
    } else {
        continue;
    }
}
echo "</th>";
