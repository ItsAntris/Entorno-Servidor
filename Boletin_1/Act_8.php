<?php


//Si lo ejecutas con la terminal si funciona lo del redline, pero con el debug de visual no
// $peso = readline("Introduce tu peso en kg: ");
// $altura = readline("Introduce tu altura en metros: ");

$peso=74.2;
$altura=1.77;
$calculoImc = $peso / ($altura * $altura);

$imc = number_format($calculoImc, 2);

echo "Tu IMC es " . $imc . "\n";

