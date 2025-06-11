<?php
require_once "../bd/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $con = $conexion->getConexion();

    
    $id = $con->real_escape_string($_POST['id']);
    $titulo = $con->real_escape_string($_POST['titulo']);
    $linea = $con->real_escape_string($_POST['id_linea']);
    $resumen = $con->real_escape_string($_POST['resumen']);
    $objetivos = $con->real_escape_string($_POST['objetivos']);
    $tesista = $con->real_escape_string($_POST['id_tesista']);
    $fechaInicio = $con->real_escape_string($_POST['fechaInicio']);
    $fechaFin = $con->real_escape_string($_POST['fechaFin']);
    

    $sql = "UPDATE tesis 
            SET titulo = '$titulo', id_linea = '$linea', resumen = '$resumen',objetivos = '$objetivos', fechaInicio = '$fechaInicio', fechaFin = '$fechaFin', id_tesista = '$tesista'
            WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: indexTesis.php?success=1");
    } else {
        header("Location: indexTesis.php?error=" . urlencode($con->error));
    }
}
?>
