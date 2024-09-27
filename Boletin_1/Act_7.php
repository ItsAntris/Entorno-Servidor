<?php
function es_primo($n, $divisor = 2) {
    return $n > 1 && ($divisor * $divisor > $n || ($n % $divisor !== 0 && es_primo($n, $divisor + 1)));
}

// Ejemplo de uso
$numero = 29;
$resultado = es_primo($numero);
echo "$numero es primo: " . ($resultado ? 'Sí' : 'No');

// No sabia como hacerlo y use el chat