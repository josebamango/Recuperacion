<?php
require_once "funcionesPDO.php";
$textoAddUser = "";
if (isset($_POST["registrar"])) {
    if (addUsuario($_POST["usuario"], $_POST["password"])) {
        $textoAddUser = "Usuario añadido con exito";
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
<form action="#" method="post">
    <input type="text" name="usuario" placeholder="Introduzca su usuario">
    <input type="text" name="password" placeholder="Introduzca su contraseña">
    <input type="submit" name="registrar" value="Registrar">
</form>
<?= $textoAddUser ?>
</body>
</html>
