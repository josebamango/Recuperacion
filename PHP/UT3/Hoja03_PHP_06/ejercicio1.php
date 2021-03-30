<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 1</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<?php

$marcas = array(
    "PEUGEOT" => array("206", "208", "307"),
    "AUDI" => array("A4", "Q3", "R8"),
    "BMW" => array("SERIE 3", "X5", "Z4"),
);

if (isset($_POST["actualizar"])) {
    $busqueda = $_POST["marca"];
    $cochesActualizados = $_POST["actualizados"];
    for ($i = 0; $i < count($marcas[$busqueda]); $i++) {
        if ($marcas[$busqueda][$i] != $cochesActualizados[$i]) {
            echo "Se ha actualizado " . $cochesActualizados[$busqueda][$i] . " por $cochesActualizados[$i]";
            $marcas[$busqueda][$i] = $cochesActualizados[$i];
        }
    }
}


?>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 mt-5">
            <lenged class="h1 text-primary text-right">Busca tu coche</lenged>
            <form class="border border-success pt-2 px-2 pb-5" action='<?php echo $_SERVER['PHP_SELF'] ?>'
                  method="POST">
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <select class='form-control' id='modelo' name="marca">
                        <?php
                        foreach ($marcas as $key => $item) {
                            echo
                            "<option value='$key'";
                            if (isset($_POST['marca']) && $_POST['marca'] == $key) echo "selected='true'";

                            echo ">$key</option>";
                        };
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark rounded" name="buscar">Buscar</button>
                <div class="from-group mt-3">
                    <label>Modelos:</label>
                    <?php
                    if (isset($_POST["buscar"])) {
                        foreach ($marcas[$_POST['marca']] as $key => $item) {

                            echo "<input type='text' class='form-control mb-1'  value='$item' name='actualizados[]'>";
                        }
                    }
                    ?>
                    <input type="submit" class="form-control btn btn-primary" name="actualizar" value="Actualizar">
                    <input type="hidden" name="busqueda" value="<?= $_POST['marca'] ?>">

                </div>
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