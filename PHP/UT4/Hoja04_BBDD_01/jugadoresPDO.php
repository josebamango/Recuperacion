<?php
require_once "queriesPDO.php";
$nombreEquipos = getEquipos();

if (isset($_POST['mostrar'])) {
    $equipoSelected = $_POST["equipos"];
    $jugadoresEquipoSelected = getJugadoresEquipo($equipoSelected);
}


function crearTablaJugadores($arrayJugadores)
{
    foreach ($arrayJugadores as $jugador) {
        echo "<tr scope='row'>";
        echo '<td>' . $jugador["nombre"] . '</td>';
        echo '<td><input class="form-control text-center" type="number" name="peso[]" value="' . $jugador["peso"] . '"></td>';
        echo '</tr>';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Ejercicio 1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <lenged class="h1 text-primary offset-3">Elige un equipo</lenged>
            <form class="pt-2 px-2 pb-5" action='<?php echo $_SERVER['PHP_SELF'] ?>'
                  method="POST">
                <label for="equipos">Equipos:</label>

                <select name="equipos" id="equipos" class="form-control border border-success text-center">
                    <?php foreach ($nombreEquipos as $equipos) : ?>
                        <option value="<?= $equipos; ?>"> <?= $equipos ?> </option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" name="mostrar" id="mostrar" value="mostrar" class="btn btn-success mt-2">
            </form>
            <?php if (isset($_POST['mostrar'])): ?>
                <div class="row justify-content-center">
                    <table class="table table-info table-striped mt-2 text-center">
                        <thead>
                        <tr>
                            <th scope="col">
                                Nombre
                            </th>
                            <th scope="col">
                                Peso (kg)
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php crearTablaJugadores($jugadoresEquipoSelected) ?>
                        </tbody>

                    </table>

                </div>
            <?php endif ?>
        </div>
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