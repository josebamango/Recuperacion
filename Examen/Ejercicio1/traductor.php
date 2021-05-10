<?php
if (isset($_POST['comprobar'])) {
    $diaSelected = $_POST['dias'];
    $ingles = $_POST['ingles'];
}

$dias = array(
    "Lunes" => "Monday",
    "Martes" => "Tuesday",
    "Miercoles" => "Wednesday",
    "Jueves" => "Thursday",
    "Viernes" => "Friday",
    "Sabado" => "Saturday",
    "Domingo" => "Sunday",
);

$mensaje="";
    if (isset($_POST['comprobar'])) {
        if (strtolower($dias[$diaSelected]) == strtolower($ingles)) {
            $mensaje= "Correcto!";
        } else {
            $mensaje= "Incorrecto!";
        }
    }


?>


<!doctype html>
<html lang="en">
<head>
    <title>Ejercicio1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='bootstrap-4.5.3-dist\css/bootstrap.min.css'>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-2">
            <legend class="text-center text-primary mt-5">Traductor español - inglés</legend>
            <form action="" method="post">
                <select name="dias" class="form-control">
                    <?php foreach ($dias as $esp => $ing): ?>
                        <option value="<?= $esp ?>"><?= $esp ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="ingles" class="form-control mt-2 mb-2" placeholder="En inglés?">
                <input type="submit" name="comprobar" class="btn btn-success">
                <?php if (isset($_POST['comprobar'])): ?>
                    <p class="alert alert-info mt-3" role="alert"><?= $mensaje ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>


</body>
</html>