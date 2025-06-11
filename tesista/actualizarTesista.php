<?php
require_once "../bd/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $con = $conexion->getConexion();

    $id = $con->real_escape_string($_POST['id']);
    $apellidos = $con->real_escape_string($_POST['apellidos']);
    $nombres = $con->real_escape_string($_POST['nombres']);
    $dni = $con->real_escape_string($_POST['dni']);
    $id_tipo = $con->real_escape_string($_POST['id_tipo']);

    $sql = "UPDATE tesista 
            SET apellidos = '$apellidos', nombres = '$nombres', dni = '$dni', id_tipo = '$id_tipo'
            WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: indexTesista.php?success=1");
    } else {
        header("Location: indexTesista.php?error=" . urlencode($con->error));
    }
}
?>
