<?php
require_once 'queriesMySQLi.php';
require_once 'queriesPDO.php';
session_start();
$errorLogin = '';
var_dump($_POST);
if (isset($_POST['entrar'])) {
    $dni = $_POST['dni'];
    if ((checkDNI($dni)) !== 0) {
        $_SESSION['visitante'] = getUsuario($dni);
        header("Location: actividades.php");
        exit();
    } else {
        $errorLogin = "Error de login!";
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <title>Index</title>
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
            <legend class="text-center text-primary mt-5">Introduce tu DNI</legend>
            <form action="index.php" method="post">
                <input type="text" name="dni" placeholder="DNI">
                <input type="submit" name="entrar" value="entrar">
            </form>
            <?php if (isset($_POST['entrar'])): ?>
                <p class="alert alert-info mt-3" role="alert"><?= $errorLogin ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>