<?php

$anioActual=date('Y');
$anioNacimiento=2002;

if(($anioActual-$anioNacimiento)>=18){
    echo "Es mayor de edad";
}else{
    echo "Es menor de edad";
}