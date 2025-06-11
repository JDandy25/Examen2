<?php
require_once "../bd/Conexion.php";

if (!isset($_GET['id'])) {
    header("Location: indexTesista.php?error=ID no proporcionado");
    exit();
}

$id = $_GET['id'];
$conexion = new Conexion();
$con = $conexion->getConexion();

// Obtener persona
$sql = "SELECT * FROM tesista WHERE id = $id";
$resultado = $con->query($sql);
$persona = $resultado->fetch_assoc();

// Obtener tipos de persona
$sqlTipo = "SELECT * FROM tipoEscuela WHERE estado = 1 ORDER BY escuela";
$resultadoTipo = $con->query($sqlTipo);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../stilos.css">
    <title>Editar tesista</title>
</head>
<body>
    <h1>Editar Tesista</h1>

    <form action="actualizarTesista.php" method="POST">
        <input type="hidden" name="id" value="<?= $persona['id'] ?>">

        <div>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?= $persona['apellidos'] ?>" required>
        </div>

        <div>
            <label>Nombres:</label>
            <input type="text" name="nombres" value="<?= $persona['nombres'] ?>" required>
        </div>

        <div>
            <label>DNI:</label>
            <input type="text" name="dni" value="<?= $persona['dni'] ?>" maxlength="8" required>
        </div>

        <div>
            <label>Tipo de Escuela Profecional:</label>
            <select name="id_tipo" required>
                <?php
                while ($tipo = $resultadoTipo->fetch_assoc()) {
                    $selected = $tipo['id'] == $persona['id_tipo'] ? "selected" : "";
                    echo "<option value='{$tipo['id']}' $selected>{$tipo['escuela']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit">Actualizar</button>
    </form>

    <a href="indexTesista.php">Volver</a>
</body>
</html>
