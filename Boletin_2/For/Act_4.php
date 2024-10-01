<?php

$suma;

for ($i = 0; $i < 101; $i++) {
    global $resultado, $suma;

    $suma += $i;
}

echo $suma;