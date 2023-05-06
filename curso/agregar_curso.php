<?php

include('../conexion.php');

// Obtenemos la información del alumno
$nombre = $_POST['nombre'];
$credito = $_POST['credito'];

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Formamos la consulta SQL
$sql = "INSERT INTO curso (nombre_curso, creditos) VALUES ('".$nombre."', '".$credito."')";

// Ejecutamos la instrucción SQL
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agregar Curso</title>
</head>
<body>
    <div class="container">
    <h1>Nuevo Curso</h1>
    <h3 class="col-4">
    <?php
        if (!$resultado) {
            echo 'No se ha podido registrar el curso';
        }
        else {
            header('location:cursos.php');
        }
    ?>
    </h3>
    <a href="cursos.php"><button class="btn btn-info col-2">Regresar</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>