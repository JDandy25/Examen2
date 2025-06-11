<?php
require_once "../bd/Conexion.php";

if (!isset($_GET['id'])) {
    header("Location: indexTesis.php?error=ID no proporcionado");
    exit();
}

$id = $_GET['id'];
$conexion = new Conexion();
$con = $conexion->getConexion();

// Eliminación lógica: cambiar estado a 0
$sql = "UPDATE tesis SET estado = 0 WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: indexTesis.php?success=1");
    } else {
        header("Location: indexTesis.php?error=" . urlencode($con->error));
    }
?>
