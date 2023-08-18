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
                <li><a href="../modulos.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form class="row g-3 bg-dark text-white" action="../sql/modulos-transfer.php" method="post">
            <?php
            include "../sql/modulos-transfer.php";
            $key = $_GET['key'];
            $C = ""; $NM = ""; $H = ""; $CR = ""; $M = "Number";
            if ($key != "N") {
                $R = getActualizar($key);
                $key = "E";
                $C = $R[0];
                $NM = $R[1];
                $H = $R[2];
                $CR = $R[3];
                $M = "hidden";
            } else {
                $key = "N";
            }
            
            ?>
            <input type="hidden" name="key" value="<?php echo $key ?>">
            <input type="hidden" name="id" value="<?php echo $R[0] ?>">
            <div class="col-md-4">
                <label for="Codigo" class="form-label">Codigo:</label>
                <input type="<?php echo $M ?>" class="form-control" id="Codigo" name="Codigo" value="<?php echo $C ?>">
            </div>
            <div class="col-md-4">
                <label for="NomModulo" class="form-label">Modulo:</label>
                <input type="text" class="form-control" id="NomModulo" name="NomModulo" value="<?php echo $NM ?>">
            </div>
            <div class="col-md-4">
                <label for="Horas" class="form-label">Horas:</label>
                <input type="time" class="form-control" id="Horas" name="Horas" value="<?php echo $H ?>">
            </div>
            <div class="col-md-4">
                <label for="Creditos" class="form-label">Creditos:</label>
                <input type="Number" class="form-control" id="Creditos" name="Creditos" value="<?php echo $CR ?>">
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