<?php
require_once 'queriesPDO.php';
session_start();
$texto = "";
if (isset($_POST['reservar'])) {
    $id_cliente = $_SESSION['visitante']['id'];
    $id_viaje = $_POST['viaje'];
    $plazas = $_POST['personas'];
    if (addReserva($id_cliente, $id_viaje, $plazas)) {
        $texto = "Viaje reservado!";
    } else {
        $texto = "Error al reservar el viaje!";
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
<?php if (isset($_SESSION["visitante"])) : ?>
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-4">
            <p class="h3 text-left">Hola <?=$_SESSION['visitante']['nombre']?> - reserva tu viaje</p>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="viaje">Elige el viaje:</label>
                    <select name="viaje" class="form-control">
                        <?php foreach (getViajes() as $viaje) : ?>
                            <option value="<?= $viaje["id"] ?>"><?= $viaje["nombre"] . " (" . $viaje["precio"] . "€)" ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="personas">Número de personas</label>
                    <input type="number" class="form-control" name="personas">
                </div>
                <input type="submit" name="reservar" value="Reservar" class="btn btn-success">
                <hr>
                <a href="viajes.php" class="btn btn-primary">Ver el listado de los viajes</a>
                <a href="reservas_realizadas.php" class="btn btn-info">Ver reservas</a>
                <a href="logout.php" class="btn btn-warning">Desconectar <?= $_SESSION['visitante']['nombre'] ?></a>
                <?php if (isset($_POST["reservar"])) : ?>
                    <p class="alert alert-info mt-2 text-center" role="alert"><?= $texto ?></p>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>
<?php else : ?>
    <?php
    session_start();
    session_unset();
    header("Location: index.php");
    ?>
<?php endif; ?>'
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