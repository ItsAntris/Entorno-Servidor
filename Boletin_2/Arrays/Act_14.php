<?php

$puntuacionesJugadores = [
    "Juan" => [80, 90, 75],
    "Ana" => [85, 88, 92],
    "Carlos" => [78, 84, 89],
    "Lucía" => [90, 92, 95]
];

foreach ($puntuacionesJugadores as $jugador => $puntuaciones) {
    echo "Jugador: " . $jugador . "\n";
    echo "Puntuaciones: ";

    foreach ($puntuaciones as $puntuacion) {
        echo $puntuacion . " ";
    }
    
    echo "\n----------------------\n";
}
