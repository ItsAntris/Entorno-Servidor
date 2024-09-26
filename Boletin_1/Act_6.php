<?php

$celsius=86;
$fahrenheit;

function calculo(){
    global $fahrenheit, $celsius;

    echo $fahrenheit=($celsius*9/5)+32;
}

calculo();