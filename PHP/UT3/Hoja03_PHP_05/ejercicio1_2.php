<?php
$texto = "";
if (isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $cantidad = ($_POST["cantidad"]);
    $destino = ($_POST["destino"]);
    $origen = ($_POST["origen"]);

    $vainaEuro = array("euro" => 1, "dolar" => 1.09, "libra" => 0.89);
    $vainaDolar = array("euro" => 0.91, "dolar" => 1, "libra" => 0.81);
    $vainaLibra = array("euro" => 1.12, "dolar" => 1.23, "libra" => 1);

    $tiposCambio = array("euro" => $vainaEuro, "dolar" => $vainaDolar, "libra" => $vainaLibra);

    $resultado = $cantidad * $tiposCambio[$origen][$destino];
    $texto = "$cantidad $origen" . "s son " . "$resultado $destino" . "s";


}


?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Conversor de monedas</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<div class="container-fluid">
    <div class="row text-center">
        <div class="alert alert-danger col-12" role="alert"><?php echo "$texto" ?></div>
    </div>
    <legend class="text-primary text-center h1">Conversor de monedas</legend>
    <div class="row justify-content-center">
        <form class="col-4 " method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" <?php
                if (isset($_POST["cantidad"])) {
                    echo "value = '$cantidad'";
                } ?> name="cantidad" id="cantidad" class="form-control" step="any" min="0" required>
            </div>
            <div class="form-group">
                <label for="origen">Origen</label>
                <select class="form-control" name="origen" id="origen">
                    <option value="libra">Libras</option>
                    <option value="euro">Euros</option>
                    <option value="dolar">Dolares</option>
                </select>
            </div>
            <div class="form-group">
                <label for="destino">Destino</label>
                <select class="form-control" name="destino" id="destino">
                    <option value="libra">Libras</option>
                    <option value="euro">Euros</option>
                    <option value="dolar">Dolares</option>
                </select>
            </div>
            <div class="row justify-content-center">
                <input name="submit" class="btn btn-success mb-3" type="submit" value="Convertir">
            </div>
        </form>

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