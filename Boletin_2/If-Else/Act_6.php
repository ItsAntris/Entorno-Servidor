<?php

$anio = 2020;
$bisiesto = false;

if ($anio % 4 == 0 && ($anio % 100 != 0 || $anio % 400 == 0)) {
    $bisiesto = true;
}

if ($bisiesto) {
    echo "Es bisiesto";
} else {
    echo "No es bisiesto";
}

