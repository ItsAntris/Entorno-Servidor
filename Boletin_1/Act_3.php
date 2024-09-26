<?php
$num1=70;
$num2= 35;

$suma;
$resta;
$producto;
$division;

function calculo(){
    global $num1,$num2, $suma, $resta, $producto, $division;

    echo $suma=$num1+$num2 . " ";
    echo $resta=$num1-$num2 . " ";
    echo $producto=$num1*$num2 . " ";
    echo $division=$num1/$num2 . " ";
}

calculo();