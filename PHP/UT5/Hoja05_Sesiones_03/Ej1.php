<?php
session_start();
if (isset($_SESSION["visita"])) {
    $_SESSION["visita"]++;
} else {
    $_SESSION["visita"] = 0;
}

echo "Se ha visitado " . $_SESSION["visita"] . " veces.";
