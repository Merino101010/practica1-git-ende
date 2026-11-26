<?php
require __DIR__ .  '/../conexion.php';
/*SQL: delete from usuarios where id=:id*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contra = $_POST["password"];

    $sql = "INSERT INTO USUARIOS (nombre, email, contra)  values(:nombre, :email, :contra)";

    $resultadoValores =  $conexion->prepare($sql);
    $resultadoValores->execute(["nombre" => $nombre, "email" => $email, "contra" => $contra]);







    echo '<a href="611.html">Añadir usuario</a>';

    echo "<table>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>email</th>
            <th>editar</th>
        </tr>";





    echo "</table>";
}
if (isset($_GET["accion"])) {

    if ($_GET["accion"] === "borrar") {
        if (isset($_GET["id"])) {
            $borrar = $conexion->prepare("Delete from usuarios where id = :id");
            $borrar->execute(["id" => $_GET["id"]]);
        }
    }

    if ($_GET['accion'] === 'editar') {
        if (isset($_GET["id"])) {
            $editar = $conexion->prepare("update usuarios set nombre = :nada where id = :id");
            $editar->execute([":nada" => "", ":id" => $_GET["id"]]);
        }

        if (isset($_GET["nombreNuevo"])) {
            $peditar = $conexion->prepare("Update usuarios set nombre = :nuevo where id = :id");
            $peditar->execute([":nuevo" => $_GET["nombreNuevo"], ":id" => $_GET["id"]]);
        }
    }
}
//pdoquerysqlfila
$sql2 = "SELECT id, nombre, email, contra from usuarios";
$resultadoValores2 = $conexion->prepare($sql2);
$resultadoValores2->execute();
$usuarios = $resultadoValores2->fetchObject();
foreach ($conexion->query($sql2) as $usuario) {
    /*todo cambiar a td*/
    echo "
        <tr>
        
            <th>" . htmlspecialchars($usuario["id"]) . "</th>
            <th>" . htmlspecialchars($usuario["nombre"]) . "</th>
             <th>" . htmlspecialchars($usuario["email"]) . "</th> 
            <th><a href='611.php?accion=editar&id='" . $usuario['id'] . "'>Editar</a></th>
                <th><a href='611.php?accion=borrar&id='" . $usuario['id'] . "'>borrar</a></th>
        </tr> ";
}
