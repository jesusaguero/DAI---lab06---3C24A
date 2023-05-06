<?php 
include('../conexion.php');
$conexion = conectar();
$curso_id = $_POST['curso_id'];
$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];
$sql2 = "UPDATE curso SET nombre_curso='".$nombre_curso."', creditos='".$creditos."', WHERE curso_id='".$curso_id."'";
$resultado = mysqli_query($conexion, $sql2);
desconectar($conexion);
header('location:cursos.php');
?>