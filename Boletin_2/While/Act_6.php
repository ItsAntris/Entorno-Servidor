<?php

$termino1 = 0;
$termino2 = 1;
$contador = 0;
$max_terminos = 10;

while ($contador < $max_terminos) {
    echo $termino1 . "\n";

    $siguiente_termino = $termino1 + $termino2;

    $termino1 = $termino2;
    $termino2 = $siguiente_termino;
    
    $contador++;
}
