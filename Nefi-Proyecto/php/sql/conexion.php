<?php
function conectar()
{
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $datab = "instituto";
    $conexion = mysqli_connect($host, $user, $password, $datab);
    if (!$conexion) {
        echo ("<script>alert('No se pudo establecer la conexion con SQL');</script>");
    } else {
        return $conexion;
    }
}
function desconectar($db)
{
    mysqli_close($db);
}
?>