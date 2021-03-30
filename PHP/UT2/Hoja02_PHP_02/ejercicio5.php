<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
<?php

$temporal = "Juan";
echo $temporal . "= " . gettype($temporal) . "<br>";
$temporal = 3;
echo $temporal . "= " . gettype($temporal) . "<br>";
$temporal = 14;
echo $temporal . "= " . gettype($temporal) . "<br>";
$temporal = false;
echo gettype($temporal) . "<br>";
$temporal = null;
echo gettype($temporal);

?>
</body>

</html>