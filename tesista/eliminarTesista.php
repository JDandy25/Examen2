<?php
require_once "../bd/Conexion.php";

if (!isset($_GET['id'])) {
    header("Location: indexTesista.php?error=ID no proporcionado");
    exit();
}

$id = $_GET['id'];
$conexion = new Conexion();
$con = $conexion->getConexion();

// Eliminación lógica: cambiar estado a 0
$sql = "UPDATE tesista SET estado = 0 WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: indexTesista.php?success=1");
    } else {
        header("Location: indexTesista.php?error=" . urlencode($con->error));
    }
?>
