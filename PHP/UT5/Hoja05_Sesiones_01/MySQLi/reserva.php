<?php
require_once "funcionesMySQLi.php";

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    exit();
} else {
    if (!usuarioCorrecto($_SERVER["PHP_AUTH_USER"], $_SERVER["PHP_AUTH_PW"])) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit();
    }
}
$texto = "";
if (isset($_POST["nombre"]) && isset($_POST["dni"])) {
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $asiento = $_POST["asiento"];

    if (reservarAsiento($nombre, $dni, $asiento)) {
        $texto = "Plaza reservada con exito";
    } else {
        $texto = "Error";
    }
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Reserva de asiento</h1>
<hr>
<form action="#" method="post">
    <label for="nombre">
        Nombre: <input type="text" name="nombre" id="nombre" placeholder="Su nombre">
    </label><hr>
    <label for="dni">
        DNI: <input type="text" name="dni" id="dni" placeholder="Su DNI">
    </label><hr>
    <label for="asiento">
        Asiento: </label>
    <select name="asiento">
        <?php foreach (getPlazasNoReservadas() as $plaza) : ?>
            <option value="<?= $plaza["numero"] ?>"><?= $plaza["numero"]." (".$plaza["precio"]."€)" ?></option>
        <?php endforeach ?>
    </select><hr>
    <input type="submit" name="reservar" value="Reservar">
</form>
<a href="inicio.php"><input type="button" value="Atrás"></a>
<?= $texto ?>
</body>
</html>
