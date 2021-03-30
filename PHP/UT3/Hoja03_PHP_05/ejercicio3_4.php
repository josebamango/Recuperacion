<?php

$listadoPeliculas = array(
    array("titulo" => "North by Northwest", "img" => "img/north.jpg"),
    array("titulo" => "Sound of Metal", "img" => "img/metal.jpg"),
    array("titulo" => "Joker", "img" => "img/joker.png"),
    array("titulo" => "Seven Pounds", "img" => "img/7.jpg"),
    array("titulo" => "Scarface", "img" => "img/scarface.jpg"),
    array("titulo" => "Jojo Rabit", "img" => "img/jojorabbit.jpg"),
    array("titulo" => "Apocalypse Now", "img" => "img/now.jpg"),
    array("titulo" => "Parasite", "img" => "img/parasite.jpg"),
    array("titulo" => "Un día más con vida", "img" => "img/vida.jpg"),
    array("titulo" => "Psicosis", "img" => "img/psicosis.jpg")
);
$resultado = array();
$busqueda = "";
if (isset($_POST["pelicula"])) {
    $busqueda = strtolower($_REQUEST["pelicula"]);
    foreach ($listadoPeliculas as $pelicula) {
        if (strpos(strtolower($pelicula["titulo"]), $busqueda) !== false) {
            $resultado[] = $pelicula;
        }
    }
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 3 y 4</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<style>
    img {
        width: 250px;
    }
</style>
<body>
<div class="container-fluid">
    <div class="row text-center">
        <div class="alert alert-success col-12" role="alert"><?php echo "Se han encontrado ".count($resultado) . " películas para la búsqueda '$busqueda'" ?></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <legend class="h2 text-center text-primary">Buscador de peliculas</legend>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="pelicula">Buscador</label>
                    <input type="text" class="form-control" name="pelicula" id="pelicula" autofocus>
                </div>
                <button name="submit" type="submit" class=" btn btn-primary mb-3">Buscar</button>
                <table class="table table-striped table-success table-hover text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                    </tr>
                    </thead>
                    <?php foreach ($resultado as $pelicula) : ?>
                        <tr>
                            <td>
                                <img class="img-fluid" src='<?= $pelicula["img"] ?>'>
                            </td>
                            <td class="text-center h3">
                                <?= $pelicula["titulo"] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </form>
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