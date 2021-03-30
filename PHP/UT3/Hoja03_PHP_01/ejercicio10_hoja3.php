<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>

<?php

$numero = 11;
$primo = true;
for ($i = 2; $i <= $numero / 2; $i++) {
    if ($numero % $i == 0) {
        $primo = false;
    }
}
echo $primo ? "$numero es primo" : "$numero no es primo";

?>

</body>
</html>