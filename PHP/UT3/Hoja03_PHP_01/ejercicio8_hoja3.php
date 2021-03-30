<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>

<?php
$numero = 11;
$factorial = 1;
for ($i = 1; $i <= $numero; $i++) {
    $factorial *= $i;
    $i++;
}
echo "el factorial de $numero, es: $factorial";
?>

</body>

</html>