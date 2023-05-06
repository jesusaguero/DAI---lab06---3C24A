<?php
include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT matricula.matricula_id, alumno.nombres, curso.nombre_curso, matricula.fecha_matricula
FROM matricula
INNER JOIN alumno ON matricula.alumno_id = alumno.alumno_id
INNER JOIN curso ON matricula.curso_id = curso.curso_id';

// Ejecutamos el query en la conexion abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexion
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriculas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Matriculas</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Nueva matricula</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Fecha de matricula</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($matricula = mysqli_fetch_array($resultado)){
                            $matricula_id = $matricula['matricula_id'];
                            $nombres = $matricula['nombres'];
                            $nombre_curso = $matricula['nombre_curso'];
                            $fecha_matricula = $matricula['fecha_matricula'];

                            echo '<tr>';
                            echo '<td>' . $matricula_id . '</td>';
                            echo '<td>' . $nombres . '</td>';
                            echo '<td>' . $nombre_curso . '</td>';
                            echo '<td>' . $fecha_matricula . '</td>';
                            echo '<td><a href="editar_matricula.php?matricula_id=' . $matricula_id . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_matricula.php?matricula_id=' . $matricula_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>