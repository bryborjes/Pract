<?php
include 'conexion.php';
function get()
{
    $conexion = conectar();
    $datos = mysqli_query($conexion, "SELECT * FROM modulos");
    desconectar($conexion);
    return $datos;
}

function getActualizar($ID)
{
    $conexion = conectar();
    $sql = "SELECT * FROM modulos WHERE Codigo = '" . $ID . "'";
    $consulta = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($consulta);
    return [
        $row['Codigo'],
        $row['NomModulo'],
        $row['Horas'],
        $row['Creditos']
    ];
}

$activador = "";
if (isset($_POST['key'])) {
    if (($activador = $_POST['key']) == "E") {
        $Codigo = $_POST['Codigo'];
        $NomModulo = $_POST['NomModulo'];
        $Horas = $_POST['Horas'];
        $Creditos = $_POST['Creditos'];
    
        actualizar($Codigo, $NomModulo, $Horas, $Creditos);
    
    } else if ($activador == "N") {
        $Codigo = $_POST['Codigo'];
        $NomModulo = $_POST['NomModulo'];
        $Horas = $_POST['Horas'];
        $Creditos = $_POST['Creditos'];
    
        set($Codigo, $NomModulo, $Horas, $Creditos);
    }
}

function set($Codigo, $NomModulo, $Horas, $Creditos)
{
    $conexion = conectar();
    $operacion = "INSERT INTO `modulos` (`Codigo`, `NomModulo`, `Horas`, `Creditos`) 
    VALUES ('$Codigo', '$NomModulo', '$Horas', '$Creditos')";
    if (mysqli_query($conexion, $operacion)) {
        echo "
        <script type='text/JavaScript'>
            alert('Modulo agregado exitosamente.');
            window.location.href='../modulos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo.');
            window.location.href='../modulos.php';
        </script>";
    }
    desconectar($conexion);
}

function actualizar($Codigo, $NomModulo, $Horas, $Creditos)
{
    $conexion = conectar();
    $sql = "UPDATE `modulos` SET `NomModulo` = '$NomModulo', `Horas` = '$Horas', 
    `Creditos` = '$Creditos' WHERE `modulos`.`Codigo` = $Codigo";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Informacion de Maestro(a) modificada con exito');
            window.location.href='../modulos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../modulos.php';
        </script>";
        desconectar($conexion);
    }
}


$eliminacion = 0;
if (($eliminacion = isset($_GET['elim'])) != 0) {
    $id = $_GET['elim'];
    eliminar($id);
}
function eliminar($id)
{
    $conexion = conectar();
    $sql = "DELETE FROM modulos WHERE Codigo = '$id'";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Los datos han sido eliminados exitosamente');
            window.location.href='../modulos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../modulos.php';
        </script>";
    }
}
?>