<?php
$libros = array(
    "Histórica y Aventuras" => array(
        array("titulo" => "Las legiones malditas", "imagen" => "legiones_malditas.jpg", "autor" => "Santiago Posteguillo"),
        array("titulo" => "Los pilares de la tierra", "imagen" => "pilares_tierra.jpg", "autor" => "Ken Follett"),
        array("titulo" => "La caída de los gigantes", "imagen" => "caida_gigantes.jpg", "autor" => "Ken Follett"),
        array("titulo" => "Africanus, el hijo del cónsul", "imagen" => "africanus.jpg", "autor" => "Santiago Posteguillo")
    ),
    "Narrativa" => array(
        array("titulo" => "Patria", "imagen" => "patria.jpg", "autor" => "Fernando Aramburu"),
        array("titulo" => "Dime quién soy", "imagen" => "dime_quien_soy.jpg", "autor" => "Julia Navarro"),
        array("titulo" => "Dispara, yo ya estoy muerto", "imagen" => "dispara_muerto.jpg", "autor" => "Julia Navarro")
    ),
    "Literatura contemporánea" => array(
        array("titulo" => "Cien años de soledad", "imagen" => "cien_anyos_soledad.jpg", "autor" => "Gabriel García Márquez"),
        array("titulo" => "Crónica de una muerte anunciada", "imagen" => "cronica_muerte.jpg", "autor" => "Gabriel García Márquez"),
        array("titulo" => "El amor en tiempos de cólera", "imagen" => "amor_tiempos_colera.jpg", "autor" => "Gabriel García Márquez")
    ),

);

function getAutores($libros)
{
    foreach ($libros as $genero => $coleccion) {
        foreach ($coleccion as $arrayLibros) {
            $autores[] = $arrayLibros["autor"];
        }
    }
    return array_unique($autores);
}

$autores=getAutores($libros);
foreach ($autores as $autore) {
    echo $autore."<br>";
}

$a = $b = "3.1416";
settype($b, "float"); //y cambiamos $b a tipo float
print "\$a vale $a y es de tipo ".gettype($a);
print "<br />";
print "\$b vale $b y es de tipo ".gettype($b);
