<?php

require_once "../bd/Conexion.php";

$sql = "select * from tipoEscuela where estado = 1 order by escuela";
$objetocon = new Conexion();

$con = $objetocon->getConexion();
$resultadoTipoPersona = $con->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../stilos.css">
    <title>Registro de Tesista</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <h1>Registrar Nuevo Tesista</h1>

    <?php
    // Mostrar mensajes si existen
    if (isset($_GET['success'])) {
        echo '<p class="success">Registro insertado correctamente.</p>';
    }
    if (isset($_GET['error'])) {
        echo '<p class="error">Error: ' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>

    <form action="guardarTesista.php" method="POST">
        <div>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" placeholder="Ingresar Apellidos" required>
        </div>

        <div>
            <label>Nombres:</label>
            <input type="text" name="nombres" placeholder="Ingresar los Nombres" required>
        </div>

        <div>
            <label>DNI:</label>
            <input type="text" name="dni" maxlength="8" placeholder="Ingresar DNI 8 numeros" required>
        </div>


        <div>
            <label>Escuela Profecional:</label>
            <select name="id" required>
                <option value="">Seleccionar...</option>
                <?php
                if ($resultadoTipoPersona->num_rows > 0) {
                    while ($fila = $resultadoTipoPersona->fetch_assoc()) {
                        echo "<option value='" . $fila['id'] . "'>" . $fila['escuela'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <button type="submit">Guardar</button>
    </form>
    <a href="indexTesista.php">Regresar</a>
</body>

</html>