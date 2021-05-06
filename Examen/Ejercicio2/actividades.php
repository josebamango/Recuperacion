<?php
require_once 'queriesPDO.php';
require_once 'queriesMySQLi.php';
session_start();
$texto = "";
if (isset($_POST['reservar'])) {
    $dni = $_SESSION['visitante']['dni'];
    $actividad = $_POST['viaje'];
    if (addInscripcion($actividad, $dni)) {
        $texto = "Sesión reservada!";
    } else {
        $texto = "Error al reservar la sesión!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Actividades</title>
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
                <p class="text-center h2 mt-4 text-primary">Bienvenido <?= $_SESSION['visitante']['nombre']." - ".$_SESSION['visitante']['dni'] ?></p>
                <form action="" method="post">
                    <label for="categoria">Categorías:</label>
                    <select name="categoria" class="form-control">
                        <?php foreach (getCartegorias() as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group text-center mt-5">
                        <input type="submit" name="mostrar" class="btn btn-success" value="Mostrar">
                        <a href="inscripciones.php" class="btn btn-warning">Mis inscripciones</a>
                        <a href="logout.php"
                           class="btn btn-danger">Desconectar <?/*= $_SESSION['visitante']['nombre'] */?></a>
                    </div>
                </form>
                <?php if (isset($_POST['mostrar'])): ?>
                    <?php foreach (getActividades($_POST['categoria']) as $actividad): ?>
                        <form action="" method="post" class="border border-dark text-center">
                            <p><?= $actividad["horario"] ?></p>
                            <p><?= $actividad["nombre"] ?></p>
                            <p>Plazas: <?= $actividad["plazas"] ?></p>
                            <input type="submit" class="btn btn-success" value="Inscribirse" name="reservar">
                        </form>
                    <?php endforeach; ?>
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