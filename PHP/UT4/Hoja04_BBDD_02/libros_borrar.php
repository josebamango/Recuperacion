<?php
require_once "queriesPDO.php";
$arrayLibros = getLibros();
$texto = "";
if (isset($_POST["borrar"]))
    if (deleteLibro($_POST["libro"])) {
        $texto = "El precio del libro borrado era " . getPrecio($_POST["libro"], $arrayLibros) . "€<br>";
    }

function getPrecio($id, $arrayLibros)
{
    foreach ($arrayLibros as $libro) {
        if ($libro["numero"] === $id) {
            return $libro["precio"];
        }
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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <form action="#" method="post">
                <label for="libro">Libro: </label>
                <select class="form-control" name="libro" id="libro">
                    <?php foreach (getLibros() as $libro) : ?>
                        <option value="<?= $libro["numero"] ?>"><?= $libro["titulo"] . " (" . $libro["anio"] . ")" ?></option>
                    <?php endforeach; ?>
                </select>
                <input class="btn btn-danger mt-2" type="submit" name="borrar" value="Borrar">
            </form>
            <?php if (isset($_POST["borrar"])) : ?>
                <h3 class="alert alert-info mt-2" role="alert">  <?= $texto ?></h3>
            <?php endif ?>
            <a href="libros.php" class="btn btn-primary mt-2">Volver</a>
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