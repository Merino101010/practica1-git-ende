<?php
$matriz = [];

for ($i = 1; $i <= 6; $i++) { //filas

    for ($i = 1; $i <= 9; $i++) { //columnas
        $numero = random_int(100, 999);
        $hayNumeroDentro = in_array(random_int(100, 999), $matriz, false);
        if ($hayNumeroDentro == false) {
            $matriz[$i][$j] = $numero;
        } else {
            //volver a meter numero random y comprobar
        }
    }
}
