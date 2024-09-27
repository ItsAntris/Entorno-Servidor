<?php

//Esto solo funciona si se ejecuta en la terminal
// $eva1=readline("Nota 1º evaluación: ");
// $eva2=readline("Nota 2º evaluación: ");
// $eva3=readline("Nota 3º evaluación: ");

$eva1=8;
$eva2=7.2;
$eva3=8.4;

$calculoMedia=($eva1+$eva2+$eva3)/3;
$media=number_format($calculoMedia, 2);

echo "La media es " . $media;