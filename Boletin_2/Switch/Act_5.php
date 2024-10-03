<?php

$letra="a";
$entrada=strtoupper($letra);

switch ($entrada) {
    case "A":
        echo "Excelente";
        break;
    case "B":
        echo "Muy bien";
        break;
    case "C":
        echo "Bien";
        break;
    case "D":
        echo "Suficiente";
        break;
    case "F":
        echo "Suspenso";
        break;
    default:
        echo "Entrada no válida";
}