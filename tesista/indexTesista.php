
<?php

require_once "../bd/Conexion.php";

$sql = "select * from tesista where estado = 1 order by apellidos, nombres";
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
    <title>Gestionar Tesista</title>
</head>
<body>
    
    <h1>Gestionar Tesista</h1>

    <table border="1">
        <thead>
        <tr>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Dni</th>
            <th>Escuela Profecional</th>
            
            <th>Acciones</th>
        </tr>
        </thead>
       <tbody>
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['nombres']."</td>";
                echo "<td>".$fila['dni']."</td>";
                echo "<td>".$fila['id_tipo']."</td>";
                echo "<td>";  
                echo "<a href='editarTesista.php?id=" . $fila['id'] . "'>Editar</a> | ";
                echo "<a href='eliminarTesista.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Está seguro de eliminar esta persona?');\">Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay tesistas registrados</td></tr>";
        }
        ?>
        </tbody>
        
        </table>


    <a href="../index.php">Regresar</a>
    <a href="formularioTesista.php">Registrar nuevo Tesista</a>
    
</body>
</html>