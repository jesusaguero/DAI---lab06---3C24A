<?php
include('../conexion.php');
$conexion = conectar();
$id = $_GET['id'];
$sql = "SELECT * from matricula where matricula_id='" . $id . "'";
$resultado = mysqli_query($conexion, $sql);
$alumno = mysqli_fetch_array($resultado);
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar Matricula</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center pt-5 mt-5 mr-1 text-center">
            <h1>Editar Matricula</h1>
            <form name="formMatricula2" method="post" action="matricula_editada.php">
                <table style="position:relative; margin:auto; width:100%;">
                    <tr class="row mb-3">
                    <input type="hidden" name="matricula_id" value="<?php echo $alumno['matricula_id'] ?>" required>
                        <td>Id de Curso</td>
                        <td>
                            <input type="number" name="curso_id" value="<?php echo $alumno['curso_id'] ?>" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Id de Alumno</td>
                        <td>
                            <input type="number" name="alumno_id" value="<?php echo $alumno['alumno_id'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-secondary col-4" type="submit">Actualizar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>