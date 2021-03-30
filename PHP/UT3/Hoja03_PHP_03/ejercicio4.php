<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo "<table border='1' style=padding:2%;>";
    echo "<caption>Variables de " . '$_SERVER' . "</caption>";
    foreach ($_SERVER as $variable => $contenido) {
        echo "<tr><td>" . $variable . "</td><td>" . $contenido . "</td></tr>";
    }
    echo "</table>";
    ?>
</body>

</html>