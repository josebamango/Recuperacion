<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
<?php
$er = array("o", "es", "e", "emos", "eis", "en");
$ir = array("o", "es", "e", "imos", "is", "en");
$ar = array("o", "as", "a", "amos", "ais", "an");
$verbos = array("beber", "caminar", "aplaudir");

$verbo = $verbos[rand(0, count($verbos) - 1)];
$terminacion = substr($verbo, -2);
$raiz = substr($verbo, 0, (strlen($verbo) - 2));
$conjugacion = "";
if ($terminacion == "ar") {
    foreach ($ar as $item) {
        $conjugacion .= $raiz . $item . " ";
    }
} else if ($terminacion == "er") {
    foreach ($er as $item) {
        $conjugacion .= $raiz . $item . " ";
    }
} else if ($terminacion == "ir") {
    foreach ($ir as $item) {
        $conjugacion .= $raiz . $item . " ";
    }
}

echo "<h2>Verbo conjugado</h2>" . $conjugacion;


?>
</body>
</html>