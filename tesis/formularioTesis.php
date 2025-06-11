<?php
require_once "../bd/Conexion.php";

$conexion = new Conexion();
$con = $conexion->getConexion();

// Obtener personas activas
$sql_personas = "SELECT id, nombres, apellidos FROM tesista WHERE estado = 1 ORDER BY nombres";
$resultado_personas = $con->query($sql_personas);

// Obtener libros
$sql_libros = "SELECT id, nombre FROM lineainvestigacion WHERE estado = 1 ORDER BY nombre";
$resultado_libros = $con->query($sql_libros);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../stilos.css">
    <title>Registrar Tesis</title>
</head>
<body>
    <h1>Registrar Tesis</h1>

    <form action="guardarTesis.php" method="POST">
        
        <div>
            <label>Titulo:</label>
            <input type="text" name="titulo" placeholder="Ingresar Titulo de Tesis" required>
        </div>

        <div>
            <label>Linea de Investigacion:</label>
            <select name="id_linea" required>
                <option value="">Seleccionar Linea de la Tesis...</option>
                <?php
                while ($libro = $resultado_libros->fetch_assoc()) {
                    echo "<option value='" . $libro['id'] . "'>" . $libro['nombre'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Tesista:</label>
            <select name="id_tesista" required>
                <option value="">Seleccionar Tesista...</option>
                <?php
                while ($persona = $resultado_personas->fetch_assoc()) {
                    $nombreCompleto = $persona['nombres'] . " " . $persona['apellidos'];
                    echo "<option value='" . $persona['id'] . "'>" . $nombreCompleto . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Resumen:</label>
            <input type="text" name="resumen" placeholder="Ingresar Resumen de Tesis" required>
        </div>
        
        <div>
            <label>Objetivos:</label>
            <input type="text" name="objetivos" placeholder="Ingresar Objetivos de Tesis" required>
        </div>

        <div>
            <label>Fecha Inicio:</label>
            <input type="date" name="fechaInicio" required>
        </div>

        <div>
            <label>Fecha Fin:</label>
            <input type="date" name="fechaFin" required>
        </div>

        <button type="submit">Guardar</button>
    </form>

    <a href="indexTesis.php">Volver</a>
</body>
</html>
