<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>
<?php
$n1 = 3;
$n2 = 999;
echo "Primos del $n1 al $n2 <br><br>";
for ($i = $n1; $i <= $n2; $i++) {
    $nDiv = 0;
    for ($n = 1; $n <= $i; $n++) {
        if ($i % $n == 0) {
            $nDiv = $nDiv + 1;
        }
    }
    if ($nDiv == 2 or $i == 1) {
        echo "$i-";
    }
}

?>
</body>

</html>