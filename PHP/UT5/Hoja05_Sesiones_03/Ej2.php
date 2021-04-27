<?php
session_start();

$_SESSION["misVisitas"][] = time();

foreach ($_SESSION["misVisitas"] as $item) {
    echo date("d/m/y",$item)."<br>";
}