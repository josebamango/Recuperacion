<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
<?php

$arrayArticulos = array(
    array("Codigo" => 1, "Descripcion" => "Quarter Horse", "Existencias" => 11),
    array("Codigo" => 2, "Descripcion" => "Jack Daniel´s", "Existencias" => 21),
    array("Codigo" => 3, "Descripcion" => "Barceló", "Existencias" => 5),
    array("Codigo" => 4, "Descripcion" => "Four Roses", "Existencias" => 9),

);

function mayorExistencias($arrayArticulos)
{
    $maxExistencia = 0;
    foreach ($arrayArticulos as $articulo) {
        if ($articulo["Existencias"] > $maxExistencia) {
            $descripcion = $articulo["Descripcion"];
            $maxExistencia = $articulo["Existencias"];
        }
    }
    return "El artículo con más existencias es: " . $descripcion . " con " . $maxExistencia . " unidades";
}

function sumarExistencias($arrayArticulos)
{
    $suma = 0;
    foreach ($arrayArticulos as $articulo) {
        $existencias = $articulo["Existencias"];
        $suma += $existencias;
    }
    return "En total hay " . $suma . " artículos disponibles";
}

function mostrarArray($arrayArticulos)
{
    for ($i = 0; $i < count($arrayArticulos); $i++) {
        echo "Artículo código: " . $arrayArticulos[$i]["Codigo"] . " => " . $arrayArticulos[$i]["Descripcion"] . " || Unidades disponibles => " .
            $arrayArticulos[$i]["Existencias"] . "<br>";
    }
}

echo mayorExistencias($arrayArticulos) . "<br>";
echo sumarExistencias($arrayArticulos) . "<br>";
echo "<h3>Artículos del supermercado</h3>";
mostrarArray($arrayArticulos);

?>
</body>

</html>