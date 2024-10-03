<?php

$array=[1, 2, 3];
$nuevoArray=[];

foreach ($array as $value) {
    $nuevoArray[]=$value*2;
}

foreach ($nuevoArray as $value) {
    echo $value." ";
}