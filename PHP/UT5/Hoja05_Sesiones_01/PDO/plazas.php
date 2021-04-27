<?php
require_once "funcionesPDO.php";

// COMPROBAR QUE EL USUARIO EXISTE
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
if (isset($_POST["actualizar"])) {
    if (setPrecios($_POST["numeros"], $_POST["precios"])) {
        $texto = "Precios actualizados con exito";
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
<h1>Gestion de plazas</h1>
<hr>
<form action="#" method="post">
    <?php foreach(getPlazas() as $plaza) : ?>
        <input type="hidden" name="numeros[]" value="<?= $plaza['numero'] ?>">
        <label for="precios">Plaza <?= $plaza["numero"] ?></label>
        <input type="number" name="precios[]" id="precios"
               value="<?= $plaza['precio'] ?>" step="any">€<br>
    <?php endforeach; ?>
    <hr>
    <input type="submit" name="actualizar" value="Actualizar">
</form>
<a href="inicio.php"><input type="button" value="Atrás"></a>
<?= $texto ?>
</body>
</html>
