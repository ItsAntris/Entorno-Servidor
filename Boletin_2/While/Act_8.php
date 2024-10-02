<?php

function primo($n, $divisor = 2) {
    return $n > 1 && ($divisor * $divisor > $n || ($n % $divisor !== 0 && primo($n, $divisor + 1)));
}

$num = 1;

while ($num < 51) {
    $resultado = primo($num);
    if ($resultado) {
        echo "$num es primo" . "\n";
    }
    $num++;
}
