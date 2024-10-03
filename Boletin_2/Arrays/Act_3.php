<?php

$array=[5, 6, 7];
$pares=0;
$impares=0;

foreach ($array as $value) {
    if ($value%2==0) {
        $pares++;
    } else {
        $impares++;
    }
}
echo "Pares: $pares, Impares: $impares";
