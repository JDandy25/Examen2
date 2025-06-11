<?php
require_once "../bd/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new Conexion();
    $con = $conexion->getConexion();

    // Obtener datos del formulario
    $apellidos = $con->real_escape_string($_POST['apellidos']);
    $nombres = $con->real_escape_string($_POST['nombres']);
    $dni = $con->real_escape_string($_POST['dni']);
    $id = $con->real_escape_string($_POST['id']);
    
    // Consulta SQL de inserción
    $sql = "INSERT INTO tesista (apellidos, nombres, dni, id_tipo) 
                    VALUES ('$apellidos', '$nombres', '$dni', '$id')";
    
    if ($con->query($sql)) {
        header("Location: indexTesista.php?success=1");
    } else {
        header("Location: formularioTesista.php?error=" . urlencode($con->error));
    }

} else {


    header("Location: formulario.php");

}