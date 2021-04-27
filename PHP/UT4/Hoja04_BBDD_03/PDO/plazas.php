<?php
require_once 'queriesPDO.php';
$texto = "";
if (isset($_POST["actualizar"])) {
    if (setPrecios($_POST['numeros'], $_POST['precios'])) {
        $texto = "Operación realizada con éxito!";
    }
}
?>

    <!doctype html>
    <html lang="en">
<head>
    <title>Plazas</title>
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
            <p class="h2 text-left">Gestión de plazas</p>
            <hr>
            <form action="#" method="post">
                <?php foreach (getPlazas() as $plaza) : ?>
                    <input type="hidden" name="numeros[]" value="<?= $plaza['numero'] ?>">
                    <label for="precios">Plaza: <?= $plaza["numero"].':' ?></label>
                    <input type="number" class="border-1 border-success" name="precios[]" id="precios"
                           value="<?= $plaza['precio'] ?>" step="any">€<br>
                <?php endforeach; ?>
                <input type="submit" name="actualizar" class="btn btn-success offset-3" value="Actualizar">
            </form>
            <hr>
            <a href="gestion.php" class="btn btn-primary">Atrás</a>
            <?php if (isset($_POST['actualizar'])): ?>
                <p class="alert alert-info mt-2" role="alert"><?= $texto ?></p>
            <?php endif; ?>
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
    </html><?php
