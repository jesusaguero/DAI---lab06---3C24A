<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT curso_id, nombre_curso, creditos FROM curso';

// Ejecjutamos el query en la conexión abierta
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
    <title>Cursos</title>
</head>
<body>
    <div class="container p-2">
    <h1>Cursos</h1>
        <a href="agregar_curso.html">
            <button type="button" class="btn btn-success mb-3">Nuevo curso</button>
        </a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nombre de curso</th>
                    <th>Créditos</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Recorrer el array con el resultado de la consulta
                while($curso = mysqli_fetch_array($resultado)) {
                    $curso_id = $curso['curso_id'];
                    $nombre_curso = $curso['nombre_curso'];
                    $creditos = $curso['creditos'];

                    echo '<tr>';
                    echo '<td>' . $curso_id . '</td>';
                    echo '<td>' . $nombre_curso . '</td>';
                    echo '<td>' . $creditos . '</td>';
                    echo '<td><a href="editar_curso.php?id='. $curso_id .'"><button type="button" class="btn btn-warning">Editar</button></a>
                            <a href="eliminar_curso.php?id='. $curso_id .'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>