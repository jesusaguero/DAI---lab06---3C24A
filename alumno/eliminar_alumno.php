<?php
include('../conexion.php');

if(isset($_GET['alumno_id'])) {
    
    $alumno_id = $_GET['alumno_id'];

    
    $conexion = conectar();

    
    $sql = "DELETE FROM alumno WHERE alumno_id = $alumno_id";

    
    if(mysqli_query($conexion, $sql)) {
        
        header("Location: alumnos.php");
    } else {
        
        $error = "Error al eliminar al alumno: " . mysqli_error($conexion);
    }

    
    desconectar($conexion);
} else {
    
    $error = "No se ha especificado el alumno a eliminar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Alumno</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success">El curso ha sido eliminado correctamente</div>
        <?php } ?>
        <a href="alumnos.php" class="btn btn-primary">Volver a cursos</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>