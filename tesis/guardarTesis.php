<?php
require_once "../bd/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $con = $conexion->getConexion();

    // Obtener datos del formulario
    $titulo = $con->real_escape_string($_POST['titulo']);
    $linea = $con->real_escape_string($_POST['id_linea']);
    $tesista = $con->real_escape_string($_POST['id_tesista']);
    $resumen = $con->real_escape_string($_POST['resumen']);
    $objetivos = $con->real_escape_string($_POST['objetivos']);
    $fechaInicio = $con->real_escape_string($_POST['fechaInicio']);
    $fechaFin = $con->real_escape_string($_POST['fechaFin']);
    
    // Consulta SQL de inserción
    $sql = "INSERT INTO tesis (titulo, id_linea, resumen, objetivos, fechaInicio, fechaFin, id_tesista) 
                    VALUES ('$titulo', '$linea', '$resumen', '$objetivos', '$fechaInicio', '$fechaFin', '$tesista')";
    
    if ($con->query($sql)) {
        header("Location: indexTesis.php?success=1");
    } else {
        header("Location: formularioTesis.php?error=" . urlencode($con->error));
    }

} else {


    header("Location: formularioTesis.php");

}