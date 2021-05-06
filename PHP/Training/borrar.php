<?php
require_once 'queriesPDO.php';
session_start();
$mensaje = "";
if (isset($_POST['borrar'])) {
    var_dump($_POST['viaje']);
    if (deleteReserva($_SESSION['visitante']['id'], $_POST['viaje'])) {
        $mensaje = "Reserva cancelada con éxito!";
    } else {
        $mensaje = "Error al cancelar la reserva!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Borrar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php if (isset($_SESSION['visitante'])): ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="text-center h2 mt-4 text-primary">Bienvenido <?= $_SESSION['visitante']['nombre'] ?></p>
                <table class="table table-success table-striped text-center">
                    <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Viaje</th>
                        <th>Personas</th>
                        <th>Precio total</th>
                    </thead>
                    </tr>
                    <tbody>
                    <?php foreach (getReservasUno($_SESSION['visitante']['id']) as $reserva): ?>
                        <tr>
                            <td><?= $reserva['nombreC'] ?></td>
                            <td><?= $reserva['nombreV'] ?></td>
                            <td><?= $reserva['plazas'] ?></td>
                            <td><?= $reserva['total'] . "€" ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="" method="post">
                    <label for="viaje">Selecciona el viaje que quieres borrar:</label>
                    <select name="viaje" class="form-control">
                        <?php foreach (getReservasUno($_SESSION['visitante']['id']) as $item): ?>
                            <option value="<?= $item['id_viaje'] ?>"><?= $item['nombreV'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group text-center mt-5">
                        <input type="submit" name="borrar" class="btn btn-danger" value="Borrar reserva">
                        <a href="logout.php"
                           class="btn btn-warning">Desconectar <?= $_SESSION['visitante']['nombre'] ?></a>
                    </div>
                </form>
                <?php if (isset($_POST['borrar'])): ?>
                    <p class="alert alert-info mt-2" role="alert"><?= $mensaje ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php
    session_start();
    session_unset();
    header("Location: index.php");
    ?>
<?php endif; ?>
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