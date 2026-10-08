
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
    $accion = $_POST["accion"];
    $disponible = false;
    //$busqueda = $_POST["busqueda"];
    $HayDisp = $_POST["disponibles"]??0;
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

switch ($accion) {
    case 'buscar':
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
        echo "<p>No se encuentra tu libro</p>";
    }

 case 'actualizar':
        $id = (int)($_POST['id'] ?? 0);
        $encontrado = false;

        foreach ($libros as &$libro) {          // & = por referencia
            if ($libro['id'] === $id) {
                $encontrado = true;
                if (trim($_POST['titulo'] ?? '') !== '') $libro['titulo'] = trim($_POST['titulo']);
                if (trim($_POST['autor'] ?? '') !== '')  $libro['autor']  = trim($_POST['autor']);
                if (($_POST['anio'] ?? '') !== '')       $libro['anio']   = (int)$_POST['anio'];
                if (($_POST['disponible'] ?? '') !== '') $libro['disponible'] = ($_POST['disponible'] === '1');
                break;
            }
        }
        

        $mensaje = $encontrado ? "Libro $id actualizado." : "No existe ningún libro con id $id.";
        $lista = $libros;
        break;

    // D: ELIMINAR Y REASIGNAR IDS 
    case 'eliminar':
        $id = (int)($_POST['id'] ?? 0);
        $encontrado = false;

        foreach ($libros as $posicion => $libro) {
            if ($libro['id'] === $id) {
                unset($libros[$posicion]);       // quitar el libro
                $encontrado = true;
                break;
            }
        }

        if ($encontrado) {
            $libros = array_values($libros);     //  valores ids 0,1,2... 
            foreach ($libros as $i => $libro) {
                $libros[$i]['id'] = $i + 1;      // ids nuevos: 1,2,3...
            }
            $mensaje = "Libro $id eliminado. Los ids se han reasignado.";
        } else {
            $mensaje = "No existe ningún libro con id $id.";
        }
        $lista = $libros;
        break;

    // ---------- E: AÑADIR ----------
    case 'anadir':
        $id     = (int)($_POST['id'] ?? 0);
        $titulo = trim($_POST['titulo'] ?? '');
        $autor  = trim($_POST['autor'] ?? '');
        $anio   = (int)($_POST['anio'] ?? 0);

        $idRepetido = false;
        foreach ($libros as $libro) {
            if ($libro['id'] === $id) {
                $idRepetido = true;
            }
        }

        if ($id <= 0 || $titulo === '' || $autor === '' || $anio <= 0) {
            $mensaje = "Faltan datos o no son válidos.";
        } elseif ($idRepetido) {
            $mensaje = "Ya existe un libro con id $id.";
        } else {
            $libros[] = [
                'id'         => $id,
                'titulo'     => $titulo,
                'autor'      => $autor,
                'anio'       => $anio,
                'disponible' => isset($_POST['disponible']),
            ];
            $mensaje = "Libro añadido .";
        }
        $lista = $libros;
        break;
}