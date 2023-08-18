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
                <li><a href="maestros.php">Maestros</a></li>
                <li><a href="">Modulos</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Modulo</th>
                    <th>Horas</th>
                    <th>Creditos</th>
                    <th colspan="2" class="text-center">
                        <a href="frm/Nmodulos.php? key=N" class="btn btn-primary">Agregar nuevo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "sql/modulos-transfer.php";
                $consult = get();
                while ($colum = mysqli_fetch_array($consult)) {
                    echo "<tr>";
                    echo (
                        "<td>". $colum['Codigo']."</td>".
                        "<td>".$colum['NomModulo']."</td>".
                        "<td>".$colum['Horas']."</td>".
                        "<td>".$colum['Creditos']."</td>".
                        "<td><a href='frm/Nmodulos.php? key=".$colum['Codigo']."' class='btn btn-success'>Editar</a></td>".
                        "<td><a href='sql/modulos-transfer.php? elim=".$colum['Codigo']."' class='btn btn-danger'>Eliminar</a></td>"
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