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
                <li><a href="../maestros.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form class="row g-3 bg-dark text-white" action="../sql/maestros-transfer.php" method="post">
            <?php
            include "../sql/maestros-transfer.php";
            $key = $_GET['key'];
            $N = ""; $AP = ""; $AM = ""; $D = ""; $E = ""; $T = "";
            if ($key != "N") {
                $R = getActualizar($key);
                $key = "E";
                $N = $R[1];
                $AP = $R[2];
                $AM = $R[3];
                $D = $R[4];
                $E = $R[5];
                $T = $R[6];
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
                <label for="Direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $D ?>">
            </div>
            <div class="col-md-4">
                <label for="Email" class="form-label">Email:</label>
                <input type="Email" class="form-control" id="Email" name="Email" value="<?php echo $E ?>">
            </div>
            <div class="col-md-4">
                <label for="Telefono" class="form-label">Telefono:</label>
                <input type="Number" class="form-control" id="Telefono" name="Telefono" value="<?php echo $T ?>">
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