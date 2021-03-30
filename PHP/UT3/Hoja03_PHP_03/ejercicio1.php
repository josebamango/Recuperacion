<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php


function cargar($numero)
{
    for ($i = 0; $i < $numero; $i++) {
        $alea[$i] = rand(0, $numero * 11); /*esto es de  donde a donde quieres
            que vaya. En este caso aleatorios del 0 al 111*/
    }
    return $alea;
}

function escribir($array)
{
    foreach ($array as $item) {
        echo $item . "</br>";
    }
}


function mezclar($array1, $array2)
{
    foreach ($array2 as $item) {
        $array1[] = $item;
    }
    return $array1;
}

function ordenar($array)
{
    for ($i = 1; $i < count($array); $i++) {
        for ($j = 0; $j < count($array) - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $k = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $k;
            }
        }
    }

    return $array;
}

// creo la variable array1 y la inicio cargando un array aleatorio de 11 elementos
$array1 = cargar(11);
$array2 = cargar(11);
//escribir($array1);
//escribir($array2);
// creo la variable arrayOrdenado, que va a ser el array1 pasandolo por la funcion ordenar
$arrayOrdenado = ordenar($array1);
//escribir($arrayOrdenado);
$arrayMezclado = mezclar($array1, $array2);
escribir($arrayMezclado);
?>
</body>

</html>