<?php
require_once "funcionesMySQLi.php";
$texto = "";
if (isset($_POST["llegada"])) {
    if (llegarADestino()) {
        $texto = "Los cambios se han hecho correctamente.";
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
<h1>Llegada</h1>
<hr>
<form action="#" method="post">
    <input type="submit" name="llegada" value="Llegada">
</form>
<a href="inicio.php"><input type="button" value="Atrás"></a>
<?= $texto ?>
</body>
</html>
