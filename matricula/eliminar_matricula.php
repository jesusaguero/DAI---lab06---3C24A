<?php 
include('../conexion.php');
$conexion = conectar();
$id= $_GET['id'];
$sql="DELETE from matricula where matricula_id='".$id."'";
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);

header('location:matriculas.php');
?>