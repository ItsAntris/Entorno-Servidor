<?php

$array=[1, 2, 3, 3, 4, 4, 5, 5];
$nuevoArray=[];
$anterior=null;

foreach ($array as $value) {
    if($anterior!==$value) {
        $nuevoArray[]=$value;
    }
    $anterior=$value;
}

foreach ($nuevoArray as $value) {
    echo $value." ";
}