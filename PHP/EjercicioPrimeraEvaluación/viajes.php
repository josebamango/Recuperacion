<?php
require_once 'queriesMySQLi.php';
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <title>Viajes</title>
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
                <p class="h4 text-left">Bienvenido <?= $_SESSION['visitante']['nombre'] ?></p>
                <hr>
                <table class="table table-striped table-success text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (getViajes() as $viaje): ?>
                        <tr>
                            <td><?= $viaje['nombre'] ?></td>
                            <td><?= $viaje['precio'] . "€" ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="reservar.php" class="btn btn-primary">Reservar nuevo viaje</a>
                <a href="logout.php" class="btn btn-warning">Desconectar <?= $_SESSION['visitante']['nombre'] ?></a>

            </div>
        </div>
    </div>
<?php else : ?>
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