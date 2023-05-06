<?php

include('../conexion.php');

$nombres = $_POST["nombres"];
$nombre_curso = $_POST["nombre_curso"];
$fecha_matricula = $_POST["fecha_matricula"];

$conexion = conectar();

$sql = "SELECT alumno_id FROM alumno WHERE nombres = '$nombres'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $alumno_id = $row["alumno_id"];
} else {
    echo "No se encontro al alumno.";
    mysqli_close($conexion);
    exit();
}

$sql = "SELECT curso_id FROM curso WHERE nombre_curso = '$nombre_curso'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $curso_id = $row["curso_id"];
} else {
    echo "No se encontro el curso.";
    mysqli_close($conexion);
    exit();
}

$sql = "INSERT INTO matricula (alumno_id, curso_id, fecha_matricula)
        VALUES ('$alumno_id', '$curso_id', '$fecha_matricula')";

if (mysqli_query($conexion, $sql)) {
    echo "Matricula agregada correctamente";
} else {
    echo "Error al agregar la matricula: " . mysqli_error($conexion);
}

desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matricula</title>
</head>
<body>
    <h1>Nueva Matricula</h1>
    <h3>
    <?php
        if (mysqli_affected_rows($conexion) > 0){
            echo 'Matricula registrada';
        }
        else{
            echo 'No se ha podido registrar la matricula: ' . mysqli_error($conexion);
        }
    ?>
    </h3>
    <a href="matriculas.php">Regresar</a>
</body>
</html>