<?php
require_once "queriesPDO.php";
$nombreEquipos = getEquipos();

if (isset($_POST['mostrar'])) {
    $equipoSelected = $_POST["equipos"];
    $jugadoresEquipoSelected = getJugadoresEquipo($equipoSelected);
}

function crearSelectEquipos($nombreEquipos, $equipoSelected)
{
    foreach ($nombreEquipos as $equipo) {
        $selectedProp = (isset($equipoSelected) && $equipoSelected == $equipo) ? "selected" : "";
        echo '<option value="' . $equipo . '"' . $selectedProp . '>' . $equipo . '</option>';
    }
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
            <!-- FORM PARA CREAR EL SELECT -->
            <form class="pt-2 px-2 pb-5" action='<?php echo $_SERVER['PHP_SELF'] ?>'
                  method="POST">
                <label for="equipos">Equipos:</label>
                <select name="equipos" id="equipos" class="form-control border border-success text-center">
                    <?php crearSelectEquipos($nombreEquipos, $equipoSelected) ?>
                </select>

                <input type="submit" name="mostrar" id="mostrar" value="mostrar" class="btn btn-success mt-2">
            </form>
            <!-- TABLA PARA MOSTRAR JUGADORES Y PESO -->
            <?php if (isset($_POST['mostrar'])): ?>
                <div class="row justify-content-center">
                    <table class="table table-info table-striped mt-2 text-center">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Peso (kg)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php crearTablaJugadores($jugadoresEquipoSelected) ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>

            <!-- FORM PARA CREAR LOS TRASPASOS -->

            <form class="pt-2 px-2 pb-5" action='<?php echo $_SERVER['PHP_SELF'] ?>'
                  method="POST">
                <input type="hidden" name="equipoSeleccionado" value="<?= $equipoSelected ?>">
                <lenged class="h1 mb-5 text-warning offset-3">Trading de jugadores</lenged>
                <br>
                <label class="mt-3" for="baja">Baja de jugador de los
                    <?php if (isset($_POST["mostrar"])) :
                        echo $equipoSelected.":";
                        ?>
                    <?php endif ?>
                </label>
                <select name="jugadorBaja"  class="form-control  text-center">
                    <?php foreach ($jugadoresEquipoSelected as $jugador) : ?>
                        <option value="<?php echo $jugador["nombre"] ?>">
                            <?= $jugador["nombre"] ?></option>
                    <?php endforeach ?>
                </select>

                <div class="form-group">
                    <lenged class="h3 text-danger offset-3 mb-4 mt-2">Datos del nuevo jugador</lenged>
                    <br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    <label for="procedencia">Procedencia:</label>
                    <input type="text" name="procedencia" id="procedencia" class="form-control"><label for="nombre">
                        <label for="altura">Altura:</label>
                        <input type="number" name="altura" id="altura" class="form-control">
                        <label for="peso">Peso:</label>
                        <input type="number" name="peso" id="peso" class="form-control">
                </div>
                <div class="form-group">
                    <label for="posicion">Posicion:
                        <select class="form-control" name="posicion">
                            <option value="F-G">F-G</option>
                            <option value="G-F">G-F</option>
                            <option value="C">C</option>
                            <option value="G">G</option>
                            <option value="F">F</option>
                            <option value="C-F">C-F</option>
                            <option value="G-C">F-C</option>
                        </select>
                    </label>
                </div>
                <input class=" btn btn-primary" type="submit" name="botonTraspaso" value="Realizar traspaso">

            </form>

        </div>
    </div>

</div>
</div>

<?php
if (isset($_POST["botonTraspaso"])) {
    $equipoSelected = $_POST["equipoSeleccionado"];
    $jugadorBaja = $_POST["jugadorBaja"];
    $jugadorAlta = $_POST["nombre"];
    $procedencia = $_POST["procedencia"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $posicion = $_POST["posicion"];
    if (setTraspaso($jugadorBaja, $jugadorAlta, $procedencia, $altura, $peso, $posicion, $equipoSelected)) {
        echo "<p class='font-weight-bold p-3 mb-2 bg-danger text-center'>Error al realizar el traspaso</p>";
    } else {
        echo "<p class='font-weight-bold p-3 mb-2 bg-success text-center'>Traspaso realizado con exito</p>";
    }
}
?>
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