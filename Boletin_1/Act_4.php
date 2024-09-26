<?php
$radio=7.8;

$longitud;
$area;
$volumen;

function calculo(){
    global $radio, $longitud, $area, $volumen;

    echo $longitud=2*3.14159*$radio . " ";
    echo $area=3.14159*$radio*$radio . " ";
    echo $volumen=4/3*3.14159*$radio*$radio*$radio; 
}

calculo();