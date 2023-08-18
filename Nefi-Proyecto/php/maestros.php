<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>CBTIS 254</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h1>Mi Escuela</h1>
        <nav>
            <ul>
                <li><a href="../">Inicio</a></li>
                <li><a href="alumnos.php">Alumnos</a></li>
                <li><a href="">Maestros</a></li>
                <li><a href="modulos.php">Modulos</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>N°Control</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th colspan="2" class="text-center">
                        <a href="frm/Nmaestros.php? key=N" class="btn btn-primary">Agregar nuevo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "sql/maestros-transfer.php";
                $consult = get();
                while ($colum = mysqli_fetch_array($consult)) {
                    echo "<tr>";
                    echo (
                        "<td>". $colum['ID']."</td>".
                        "<td>".$colum['Nombre']."</td>".
                        "<td>".$colum['ApellidoP']." ".$colum['ApellidoM']."</td>".
                        "<td>".$colum['Direccion']."</td>".
                        "<td>".$colum['Email']."</td>".
                        "<td>".$colum['Telefono']."</td>".
                        "<td><a href='frm/Nmaestros.php? key=".$colum['ID']."' class='btn btn-success'>Editar</a></td>".
                        "<td><a href='sql/maestros-transfer.php? elim=".$colum['ID']."' class='btn btn-danger'>Eliminar</a></td>"
                    );
                    echo "</tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2023 Nefi. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>