<?php
include 'conexion.php';
function get()
{
    $conexion = conectar();
    $datos = mysqli_query($conexion, "SELECT * FROM maestros");
    desconectar($conexion);
    return $datos;
}

function getActualizar($ID)
{
    $conexion = conectar();
    $sql = "SELECT * FROM maestros WHERE ID = '" . $ID . "'";
    $consulta = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($consulta);
    return [
        $row['ID'],
        $row['Nombre'],
        $row['ApellidoP'],
        $row['ApellidoM'],
        $row['Direccion'],
        $row['Email'],
        $row['Telefono']
    ];
}

$activador = "";
if (isset($_POST['key'])) {
    if (($activador = $_POST['key']) == "E") {
        $ID = $_POST['id'];
        $Nombre = ucwords(strtolower($_POST['Nombre']));
        $ApellidoP = ucwords(strtolower($_POST['ApellidoP']));
        $ApellidoM = ucwords(strtolower($_POST['ApellidoM']));
        $Direccion = ucwords(strtolower($_POST['Direccion']));
        $Email = ucwords(strtolower($_POST['Email']));
        $Telefono = ucwords(strtolower($_POST['Telefono']));
    
        actualizar($ID, $Nombre, $ApellidoP, $ApellidoM, $Direccion, $Email, $Telefono);
    
    } else if ($activador == "N") {
        $Nombre = ucwords(strtolower($_POST['Nombre']));
        $ApellidoP = ucwords(strtolower($_POST['ApellidoP']));
        $ApellidoM = ucwords(strtolower($_POST['ApellidoM']));
        $Direccion = $_POST['Direccion'];
        $Email = ucwords(strtolower($_POST['Email']));
        $Telefono = ucwords(strtolower($_POST['Telefono']));
    
        set($Nombre, $ApellidoP, $ApellidoM, $Direccion, $Email, $Telefono);
    }
}

function set($Nombre, $ApellidoP, $ApellidoM, $Direccion, $Email, $Telefono)
{
    $conexion = conectar();
    $operacion = "INSERT INTO `maestros` (`ID`, `Nombre`, `ApellidoP`, `ApellidoM`, `Direccion`, `Email`, `Telefono`) 
    VALUES (NULL, '$Nombre', '$ApellidoP', '$ApellidoM', '$Direccion', '$Email', '$Telefono')";
    if (mysqli_query($conexion, $operacion)) {
        echo "
        <script type='text/JavaScript'>
            alert('Alumno(a) agregado(a) exitosamente.');
            window.location.href='../maestros.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo.');
            window.location.href='../maestros.php';
        </script>";
    }
    desconectar($conexion);
}

function actualizar($ID, $Nombre, $ApellidoP, $ApellidoM, $Direccion, $Email, $Telefono)
{
    $conexion = conectar();
    $sql = "UPDATE `Estudiantes` SET `Nombre` = '$Nombre', `ApellidoP` = '$ApellidoP', `ApellidoM` = '$ApellidoM', 
    `Direccion` = '$Direccion', `Email` = '$Email', `Telefono` = '$Telefono' WHERE `maestros`.`ID` = $ID";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Informacion de Maestro(a) modificada con exito');
            window.location.href='../maestros.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../maestros.php';
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
    $sql = "DELETE FROM maestros WHERE ID = '$id'";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Los datos han sido eliminados exitosamente');
            window.location.href='../maestros.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../maestros.php';
        </script>";
    }
}
?>