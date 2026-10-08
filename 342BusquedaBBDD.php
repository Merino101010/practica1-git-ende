<?php
$libros = [

    ['id' => 1,  'titulo' => 'Don Quijote de la Mancha',       'autor' => 'Miguel de Cervantes',   'anio' => 1605, 'disponible' => true],

    ['id' => 2,  'titulo' => 'Cien años de soledad',           'autor' => 'Gabriel García Márquez', 'anio' => 1967, 'disponible' => false],

    ['id' => 3,  'titulo' => 'La sombra del viento',           'autor' => 'Carlos Ruiz Zafón',     'anio' => 2001, 'disponible' => true],

    ['id' => 4,  'titulo' => 'Rayuela',                        'autor' => 'Julio Cortázar',        'anio' => 1963, 'disponible' => true],

    ['id' => 5,  'titulo' => 'La casa de los espíritus',       'autor' => 'Isabel Allende',        'anio' => 1982, 'disponible' => false],

    ['id' => 6,  'titulo' => 'Crónica de una muerte anunciada', 'autor' => 'Gabriel García Márquez', 'anio' => 1981, 'disponible' => true],

    ['id' => 7,  'titulo' => 'Platero y yo',                   'autor' => 'Juan Ramón Jiménez',    'anio' => 1914, 'disponible' => true],

    ['id' => 8,  'titulo' => 'Los santos inocentes',           'autor' => 'Miguel Delibes',        'anio' => 1981, 'disponible' => false],

    ['id' => 9,  'titulo' => 'El amor en los tiempos del cólera', 'autor' => 'Gabriel García Márquez', 'anio' => 1985, 'disponible' => true],

    ['id' => 10, 'titulo' => 'El túnel',                       'autor' => 'Ernesto Sábato',        'anio' => 1948, 'disponible' => true],

];



IF($_SERVER["REQUEST_METHOD"] === "POST"){
    $texto = $_POST["busqueda"];
    $busqueda[]= explode(' ',$texto);
    $campo = $_POST["campo"];
    $disponibles = $_POST["disponibles"];






    foreach($libros as $libro=> $valor ){
        foreach($busqueda as $palabra){

        /*Habria que hacer aqui un if que busqye en funcion de titulo o autor en plan $palabra[$libro]===$valor['libro'] yotro if con esto $valor['autor']*/
            if( str_contains($palabra[$libro], $valor[$libro]) && $libros=$campo){
                if($valor['disponible']==$disponibles){
                    echo "<p>Cumple todos los requisitos de busqueday esta disponible</p>";
                }else{
                    echo "<p>Cumple todos los requisitos de busqueda y NO esta disponible</p>";
                }
            }
        }
        
        
    }

}