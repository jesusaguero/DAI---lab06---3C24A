<?php 
include('../conexion.php');
$conexion = conectar();
$alumno_id = $_POST['alumno_id'];
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$sql2 = "UPDATE alumno SET nombres='".$nombres."', ape_paterno='".$ape_paterno."', ape_materno='".$ape_materno."' WHERE alumno_id='".$alumno_id."'";
$resultado = mysqli_query($conexion, $sql2);
desconectar($conexion);
header('location:alumnos.php');
?>