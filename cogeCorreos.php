<html>
    <?php

$correo = "alvaromerino@gmail.com";
 global $nombre ;
 global $dominio ;

function separar($correo){
    $separar = explode("@", $correo);
global $nombre, $dominio;
 $nombre = $separar[0];
 $dominio = $separar[1]; 
echo "parte local = " . $nombre;
echo "parte dominio = " . $dominio;

}

separar($correo)








?> 
<p>correo = <?= $correo ?> </p>
<p>nombre = <?= $nombre ?> </p>
<p>dominio = <?= $dominio ?></p>
</html>