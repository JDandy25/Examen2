
<?php

require_once "../bd/Conexion.php";

$sql = "SELECT
    t.titulo AS titulo,
    l.nombre AS nombre,
    tes.nombres AS tesista,
    t.resumen AS resumen,
    t.objetivos AS objetivos,
    t.fechaInicio AS fechaInicio,
    t.fechaFin AS fechaFin,
    t.id AS id
FROM
    tesis t
INNER JOIN lineainvestigacion l ON
    t.id_linea = l.id
INNER JOIN tesista tes on 
    t.id_tesista = tes.id
WHERE
    t.estado = 1";

$objetocon = new Conexion();

$con = $objetocon->getConexion();
$resultado = $con->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilos.css">
    <title>Gestionar Tesis</title>
</head>
<body>
    
    <h1>Gestionar Tesis</h1>

    <table border="1">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Linea de Investigacion </th>
            <th>Tesista </th>
            <th>Resumen </th>
            <th>Objetivos</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Accion</th>
        </tr>
        </thead>
       <tbody>
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$fila['titulo']."</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['tesista']."</td>";
                echo "<td>".$fila['resumen']."</td>";
                echo "<td>".$fila['objetivos']."</td>";
                echo "<td>".$fila['fechaInicio']."</td>";
                echo "<td>".$fila['fechaFin']."</td>";
                echo "<td>";  
                echo "<a href='editarTesis.php?id=" . $fila['id'] . "'>Editar</a> | ";
                echo "<a href='eliminarTesis.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Está seguro de eliminar esta Tesis?');\">Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay Tesis registradas</td></tr>";
        }
        ?>
        </tbody>
        
        </table>


    <a href="../index.php">Regresar</a>
    <a href="formularioTesis.php">Registrar nueva Tesis</a>
    
</body>
</html>