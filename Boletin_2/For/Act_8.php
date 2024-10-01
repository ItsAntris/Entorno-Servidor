<?php

function primo($n, $divisor = 2) {
    return $n > 1 && ($divisor * $divisor > $n || ($n % $divisor !== 0 && primo($n, $divisor + 1)));
}

for ($i = 1; $i < 51; $i++) {
    $resultado = primo($i);
    if ($resultado== "Sí"){
        echo     "$i es primo"."\n";
    }
}