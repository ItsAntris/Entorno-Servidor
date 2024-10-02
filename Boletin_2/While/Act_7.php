<?php

$palabra = str_split("Frigorifico");
$longitud = count($palabra);
$indice = 0;

while ($indice < $longitud) {
    $letra = $palabra[$indice];
    echo $letra . "\n";
    $indice++;
}
