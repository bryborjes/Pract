<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>CBTIS 254</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h1>CBTIS 254</h1>
        <nav>
            <ul>
                <li><a href="../alumnos.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form class="row g-3 bg-dark text-white" action="../sql/alumnos-transfer.php" method="post">
            <?php
            include "../sql/alumnos-transfer.php";
            $key = $_GET['key'];
            $N = ""; $AP = ""; $AM = ""; $S = ""; $G = ""; $E = "";
            if ($key != "N") {
                $R = getActualizar($key);
                $key = "E";
                $N = $R[1];
                $AP = $R[2];
                $AM = $R[3];
                $S = $R[4];
                $G = $R[5];
                $E = $R[6];
            } else {
                $key = "N";
            }
            
            ?>
            <input type="hidden" name="key" value="<?php echo $key ?>">
            <input type="hidden" name="id" value="<?php echo $R[0] ?>">
            <div class="col-md-4">
                <label for="Nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $N ?>">
            </div>
            <div class="col-md-4">
                <label for="ApellidoP" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ApellidoP" name="ApellidoP" value="<?php echo $AP ?>">
            </div>
            <div class="col-md-4">
                <label for="ApellidoM" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="ApellidoM" name="ApellidoM" value="<?php echo $AM ?>">
            </div>
            <div class="col-md-4">
                <label for="Semestre" class="form-label">Semestre:</label>
                <select id="Semestre" class="form-select" name="Semestre">
                    <option><?php echo $S ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="Grupo" class="form-label">Grupo:</label>
                <select id="Grupo" class="form-select" name="Grupo">
                    <option><?php echo $G ?></option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="Especialidad" class="form-label">Especialidad:</label>
                <select id="Especialidad" class="form-select" name="Especialidad">
                    <option><?php echo $E ?></option>
                    <option>Programación</option>
                    <option>Logistica</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Nefi. Todos los derechos reservados.</p>
    </footer>
</body>

</html>