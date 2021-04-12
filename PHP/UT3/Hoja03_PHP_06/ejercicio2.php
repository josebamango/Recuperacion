<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 2</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<style>
    img{
        width: 500px;
    }
</style>
<body>
<?php

$liga = array(
    "Brooklyn Nets" => array(
        "Entrenador" => array(
            "Steve Nash" => "img/nash.jpg"
        ),
        "Jugadores" => array(
            "Kevin Durant" => "img/kd.jpg",
            "Kyrie Irving" => "img/kyrie.jpg",
            "James Harden" => "img/harden.jpg",
            "Joe Harris" => "img/harris.jpg",
            "DeAndre Jordan" => "img/jordan.jpg",
        )
    ),
    "Los Angeles Lakers" => array(
        "Entrenador" => array(
            "Frank Vogel" => "img/vogel.jpg"
        ),
        "Jugadores" => array(
            "LeBron James" => "img/lebron.jpg",
            "Anthony Davis" => "img/davis.jpg",
            "Montrezl Harrell" => "img/harrell.jpg",
            "Dennis Schroder" => "img/dennis.jpg",
            "Kyle Kuzma" => "img/kuzma.jpg",
        )
    ),
);

if (isset($_POST['buscar'])) {
    $equipoSeleccionado = $_POST['equipo'];
    $posicionSeleccionada = $_POST['posicion'];
}

function mostrarEquipo($liga, $equipo, $puesto)
{
    $informacionBuscada = null;
    foreach ($liga[$equipo][$puesto] as $jugador => $imagen) {
        $informacionBuscada .= "<h4 class='text-secondary'>$jugador</h4><img class='img-fluid' src='$imagen'/>";
    }
    return $informacionBuscada;
}

?>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 mt-5">
            <lenged class="h1 text-primary offset-3">Elige un equipo</lenged>
            <form class="pt-2 px-2 pb-5" action='<?php echo $_SERVER['PHP_SELF'] ?>'
                  method="POST">
                <div class="form-group">
                    <label for="equipo">Equipo:</label>
                    <select class='form-control' id='equipo' name="equipo">
                        <option value="Todos">Todos</option>
                        <?php foreach ($liga as $equipo => $vestuario) : ?>
                            <option value="<?= $equipo ?>" <?= $selectedProp = (isset($equipoSeleccionado) &&
                                $equipoSeleccionado == $equipo) ? "selected" : ""; ?>><?= $equipo ?></option>
                        <?php endforeach ?>
                    </select>


                    <label for="posicion" class="d-block mt-4">Posición:</label>
                    <?php foreach ($liga['Los Angeles Lakers'] as $posicion => $arrayJugadores) : ?>
                        <div class="form-check">
                            <label class="form-check-label" for="<?= $posicion ?>">
                                <input class="form-check-input d-block" type="radio"
                                       id="<?= $posicion ?>" <?= $checkedProp = (isset($posicionSeleccionada) &&
                                    $posicionSeleccionada == $posicion) ? "checked" : ""; ?> name="posicion"
                                       class="d-inline" value="<?= $posicion ?>">
                                <?= $posicion ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <button type="submit" class="btn btn-dark rounded" name="buscar">Buscar</button>
            </form>


            <?php if (isset($_POST['buscar'])): ?>
            <div class="row justify-content-center">
                <table class="table table-info table-striped mt-2 text-center">
                    <thead>
                    <tr>
                        <?php if ($equipoSeleccionado != "Todos") : ?>
                            <th scope="col">
                                <h2><?= $equipoSeleccionado ?></h2>
                            </th>
                        <?php else : ?>
                            <th scope="col">
                                <h3>Brooklyn Nets</h3>
                            </th>
                            <th scope="col">
                                <h3>Los Angeles Lakers</h3>
                            </th>
                        <?php endif ?>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if ($equipoSeleccionado != "Todos") : ?>
                        <?php foreach ($liga[$equipoSeleccionado][$posicionSeleccionada] as $jugador => $url) : ?>
                            <tr>
                                <td>
                                    <h4 class="text-secondary"><?= $jugador ?></h4><img class="img-fluid" src="<?= $url ?>">
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <!-- Si son todos los equipos -->
                            <?php foreach ($liga as $cadaEquipo => $value) : ?>

                                <td>
                                    <?= mostrarEquipo($liga, $cadaEquipo, $posicionSeleccionada); ?>
                                </td>

                            <?php endforeach ?>
                        </tr>
                    <?php endif ?>
                    </tbody>

                </table>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>

</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'
        integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN'
        crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'
        integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q'
        crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'
        integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl'
        crossorigin='anonymous'></script>

</html>