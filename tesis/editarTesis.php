<?php
require_once "../bd/Conexion.php";

if (!isset($_GET['id'])) {
    header("Location: indexTesis.php?error=ID no proporcionado");
    exit();
}

$id = $_GET['id'];
$conexion = new Conexion();
$con = $conexion->getConexion();

// Obtener los datos actuales del préstamo
$sql = "SELECT * FROM tesis WHERE id = $id";
$resultado = $con->query($sql);
$prestamo = $resultado->fetch_assoc();

if (!$prestamo) {
    header("Location: indexTesis.php?error=Tesis no encontrado");
    exit();
}

// Obtener personas activas
$sql_personas = "SELECT id, nombres, apellidos FROM tesista WHERE estado = 1 ORDER BY nombres";
$resultado_personas = $con->query($sql_personas);

// Obtener libros activos
$sql_libros = "SELECT id, nombre FROM lineainvestigacion WHERE estado = 1 ORDER BY nombre";
$resultado_libros = $con->query($sql_libros);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../stilos.css">
    <title>Editar Tesis</title>
</head>
<body>
    <h1>Editar Tesis</h1>

    <form action="actualizarTesis.php" method="POST">
        <input type="hidden" name="id" value="<?= $prestamo['id'] ?>">

        <div>
            <label>Titulo:</label>
            <input type="text" name="titulo" value="<?= $prestamo['titulo'] ?>" required>
        </div>

        <div>
            <label>Linea de investigacion: </label>
            <select name="id_linea" required>
                <?php
                while ($libro = $resultado_libros->fetch_assoc()) {
                    $selected = $libro['id'] == $prestamo['id_linea'] ? "selected" : "";
                    echo "<option value='" . $libro['id'] . "' $selected>" . $libro['nombre'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Tesista: </label>
            <select name="id_tesista" required>
                <?php
                while ($persona = $resultado_personas->fetch_assoc()) {
                    $nombreCompleto = $persona['nombres'] . " " . $persona['apellidos'];
                    $selected = $persona['id'] == $prestamo['id_tesista'] ? "selected" : "";
                    echo "<option value='" . $persona['id'] . "' $selected>" . $nombreCompleto . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Resumen:</label>
            <input type="text" name="resumen" value="<?= $prestamo['resumen'] ?>" required>
        </div>

        <div>
            <label>Objetivos:</label>
            <input type="text" name="objetivos" value="<?= $prestamo['objetivos'] ?>" required>
        </div>

        <div>
            <label>Fecha Préstamo:</label>
            <input type="date" name="fechaInicio" value="<?= $prestamo['fechaInicio'] ?>" required>
        </div>

        <div>
            <label>Fecha Devolución:</label>
            <input type="date" name="fechaFin" value="<?= $prestamo['fechaFin'] ?>" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>

    <a href="indexTesis.php">Volver</a>
</body>
</html>
