<?php
require_once 'queriesPDO.php';
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Inscripciones</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='bootstrap-4.5.3-dist\css/bootstrap.min.css'>
</head>
<body>
<?php if (isset($_SESSION['visitante'])): ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="text-center h2 mt-4 text-primary">
                    Bienvenido <?= $_SESSION['visitante']['nombre'] . " - " . $_SESSION['visitante']['dni'] ?></p>
                <form action="" method="post">
                    <label for="viaje">Lista de actividades:</label>
                    <form action="" method="post" class="border border-dark text-center">
                        <?php foreach (getAtividadesInscritas($_SESSION['visitante']['dni']) as $item): ?>
                            <p><?= $item["horario"] ?></p>
                            <p><?= $item["nombre"] ?></p>
                            <p>Plazas: <?= $item["plazas"] ?></p>
                        <?php endforeach; ?>
                    </form>
                    >
                    <div class="form-group text-center mt-5">
                        <a href="actividades.php"
                           class="btn btn-warning">Ver actividades disponibles</a>
                        <a href="logout.php"
                           class="btn btn-danger">Desconectar <?= $_SESSION['visitante']['nombre'] ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php else: ?>
    <?php
    session_start();
    session_unset();
    header("Location: index.php");
    ?>
<?php endif; ?>
</body>
</html>