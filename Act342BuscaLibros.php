
<?php
$libros = [

    ['id' => 1, 'titulo' => 'Don Quijote de la Mancha', 'autor' => 'Miguel de Cervantes', 'anio' => 1605, 'disponible' => true],

    ['id' => 2, 'titulo' => 'Cien años de soledad', 'autor' => 'Gabriel García Márquez', 'anio' => 1967, 'disponible' => false],

    ['id' => 3, 'titulo' => 'La sombra del viento', 'autor' => 'Carlos Ruiz Zafón', 'anio' => 2001, 'disponible' => true],

    ['id' => 4, 'titulo' => 'Rayuela', 'autor' => 'Julio Cortázar', 'anio' => 1963, 'disponible' => true],

    ['id' => 5, 'titulo' => 'La casa de los espíritus', 'autor' => 'Isabel Allende', 'anio' => 1982, 'disponible' => false],

    ['id' => 6, 'titulo' => 'Crónica de una muerte anunciada', 'autor' => 'Gabriel García Márquez', 'anio' => 1981, 'disponible' => true],

    ['id' => 7, 'titulo' => 'Platero y yo', 'autor' => 'Juan Ramón Jiménez', 'anio' => 1914, 'disponible' => true],

    ['id' => 8, 'titulo' => 'Los santos inocentes', 'autor' => 'Miguel Delibes', 'anio' => 1981, 'disponible' => false],

    ['id' => 9, 'titulo' => 'El amor en los tiempos del cólera', 'autor' => 'Gabriel García Márquez', 'anio' => 1985, 'disponible' => true],

    ['id' => 10, 'titulo' => 'El túnel', 'autor' => 'Ernesto Sábato', 'anio' => 1948, 'disponible' => true],

];


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $disponible = false;
    //$busqueda = $_POST["busqueda"];
    $HayDisp = $_POST["disponibles"];
    //$campo = $_POST["campo"];
    // $disponible = boolval($busqueda);
    $busqueda = isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";
    $campo = isset($_POST["campo"]) ? $_POST["campo"] : "titulo";

    if ($HayDisp == "1") {
        $disponible = true;
    } else {
        $disponible = false;
    }


    $arrayBusqueda = explode(" ", $busqueda);
    $contador = 0;
    /*Se podria hacer filtrando por titulo y autor a la vez pero quiero probar con esos filtros*/
    foreach ($libros as $clave => $valor) {


        if ($campo === "titulo") {
            foreach ($arrayBusqueda as $palabraClave) {
                if (str_contains($valor['titulo'], $palabraClave)) {

                    if ($disponible === $valor['disponible']) {
                        echo "<p>Libro  disponible buscado por titulo</p>";
                        $librosDescendente = [$valor['titulo'] => $valor['anio']] ;


                        $librosAno[]= ($valor['anio']);
                        $librosAnoInversa= array_reverse($librosAno);
                        foreach($librosAnoInversa as $inversa){
                            echo "<p>". $valor['titulo'] ."año $inversa</p>";
                        }
                        break;
                    }else{
                        echo "<p>Libro no disponible buscado por titulo</p>";
                        break;
                    } 
                }else {
                        $contador++;
                    }
            }
        } else if ($campo === "autor") {
            foreach ($arrayBusqueda as $palabraClave) {
                if (str_contains($valor['autor'], $palabraClave)) {
                    if ($disponible === $valor['disponible']) {
                        echo "<p>Libro  disponible buscado por autor</p>";
                        $librosDescendente = [$valor['autor'] => $valor['anio']] ;


                        $librosAno[]= ($valor['anio']);
                        $librosAnoInversa= array_reverse($librosAno);
                        foreach($librosAnoInversa as $inversa){
                            echo "<p>". $valor['autor'] ."año $inversa</p>";
                        }
                        break;
                    }else{
                        echo "<p>Libro  disponible buscado por titulo</p>";
                        break; 
                    }
                        
                    
                }
                else {
                        $contador++;      
                    }
            }
        }
    }

    if($contador === count($libros)){
        echo "<p>No se encuentra tu lirbo</p>";
    }
}
/*else {
            if ($valor['titulo'] == $palabraClave ||  $valor['autor'] === $palabraClave) {
                echo "<p>Entro filtro titulo/p>";
                foreach ($arrayBusqueda as $palabraClave) {
                    if ($disponible === $valor['disponible']) {
                        echo "<p>Libro  disponible buscado por titulo y autor</p>";
                    } else {
                        echo "<p>Libro no disponible buscado por titulo y autor</p>";
                    }
                }
            }
        }*/