<?php
include 'conexion.php';
function get()
{
    $conexion = conectar();
    $datos = mysqli_query($conexion, "SELECT * FROM Estudiantes");
    desconectar($conexion);
    return $datos;
}

function getActualizar($ID)
{
    $conexion = conectar();
    $sql = "SELECT * FROM Estudiantes WHERE ID = '" . $ID . "'";
    $consulta = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($consulta);
    return [
        $row['ID'],
        $row['Nombre'],
        $row['ApellidoP'],
        $row['ApellidoM'],
        $row['Semestre'],
        $row['Grupo'],
        $row['Especialidad']
    ];
}

$activador = "";
if (isset($_POST['key'])) {
    if (($activador = $_POST['key']) == "E") {
        $ID = $_POST['id'];
        $Nombre = ucwords(strtolower($_POST['Nombre']));
        $ApellidoP = ucwords(strtolower($_POST['ApellidoP']));
        $ApellidoM = ucwords(strtolower($_POST['ApellidoM']));
        $Semestre = ucwords(strtolower($_POST['Semestre']));
        $Grupo = ucwords(strtolower($_POST['Grupo']));
        $Especialidad = ucwords(strtolower($_POST['Especialidad']));
    
        actualizar($ID, $Nombre, $ApellidoP, $ApellidoM, $Semestre, $Grupo, $Especialidad);
    
    } else if ($activador == "N") {
        $Nombre = ucwords(strtolower($_POST['Nombre']));
        $ApellidoP = ucwords(strtolower($_POST['ApellidoP']));
        $ApellidoM = ucwords(strtolower($_POST['ApellidoM']));
        $Semestre = ucwords(strtolower($_POST['Semestre']));
        $Grupo = ucwords(strtolower($_POST['Grupo']));
        $Especialidad = ucwords(strtolower($_POST['Especialidad']));
    
        set($Nombre, $ApellidoP, $ApellidoM, $Semestre, $Grupo, $Especialidad);
    }
}

function set($Nombre, $ApellidoP, $ApellidoM, $Semestre, $Grupo, $Especialidad)
{
    $conexion = conectar();
    $operacion = "INSERT INTO `Estudiantes` (`ID`, `Nombre`, `ApellidoP`, `ApellidoM`, `Semestre`, `Grupo`, `Especialidad`) 
    VALUES (NULL, '$Nombre', '$ApellidoP', '$ApellidoM', '$Semestre', '$Grupo', '$Especialidad')";
    if (mysqli_query($conexion, $operacion)) {
        echo "
        <script type='text/JavaScript'>
            alert('Alumno(a) agregado(a) exitosamente.');
            window.location.href='../alumnos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo.');
            window.location.href='../alumnos.php';
        </script>";
    }
    desconectar($conexion);
}

function actualizar($ID, $Nombre, $ApellidoP, $ApellidoM, $Semestre, $Grupo, $Especialidad)
{
    $conexion = conectar();
    $sql = "UPDATE `Estudiantes` SET `Nombre` = '$Nombre', `ApellidoP` = '$ApellidoP', `ApellidoM` = '$ApellidoM', 
    `Semestre` = '$Semestre', `Grupo` = '$Grupo', `Especialidad` = '$Especialidad' WHERE `Estudiantes`.`ID` = $ID";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Informacion de Maestro(a) modificada con exito');
            window.location.href='../alumnos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../alumnos.php';
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
    $sql = "DELETE FROM Estudiantes WHERE ID = '$id'";
    if (mysqli_query($conexion, $sql)) {
        echo "
        <script type='text/JavaScript'>
            alert('Los datos han sido eliminados exitosamente');
            window.location.href='../alumnos.php';
        </script>";
    } else {
        echo "
        <script type='text/JavaScript'>
            alert('La operacion no se pudo llevar a cabo');
            window.location.href='../alumnos.php';
        </script>";
    }
}
?>