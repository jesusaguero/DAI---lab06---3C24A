<?php

function conectar() {
    $conexion = mysqli_connect('localhost','root','usbw','LAB06');
    return $conexion;
}

function desconectar($conn) {
    mysqli_close($conn);
}

?>