<?php
require_once 'queriesMySQLi.php';
$texto = "";
if (isset($_POST['nombre']) && isset($_POST['dni'])) {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $asiento = $_POST['asiento'];

    if (addPasajero($dni, $nombre, $asiento)) {
        $texto = "Asiento reservado!";
    } else {
        $texto = "Error al reservar el asiento!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Reserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <p class="h3 text-left">Reserva de asiento</p>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Su nombre" class="form-control text-success ">
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" placeholder="Su DNI" class="form-control text-success">
                    <label for="asiento">Asiento:</label>
                    <select name="asiento" class="form-control">
                        <?php foreach (getPlazas() as $plaza) : ?>
                            <option value="<?= $plaza["numero"] ?>"><?= $plaza["numero"] . " (" . $plaza["precio"] . "€)" ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" name="reservar" value="Reservar" class="btn btn-success">
                <hr>
                <a href="gestion.php" class="btn btn-primary">Atrás</a>
                <?php if (isset($_POST["reservar"])) : ?>
                    <p class="alert alert-info mt-2 text-center" role="alert"><?= $texto ?></p>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>