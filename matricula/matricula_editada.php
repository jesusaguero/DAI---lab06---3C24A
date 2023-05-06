<?php 
include('../conexion.php');
$conexion = conectar();
$matricula_id = $_POST['matricula_id'];
$curso_id = $_POST['curso_id'];
$alumno_id = $_POST['alumno_id'];
$sql2 = "UPDATE matricula SET curso_id='".$curso_id."', alumno_id='".$alumno_id."', WHERE alumno_id='".$matricula_id."'";
$resultado = mysqli_query($conexion, $sql2);
desconectar($conexion);
header('location:matriculas.php');
?>