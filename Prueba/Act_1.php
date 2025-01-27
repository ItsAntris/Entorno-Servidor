<?php

$victimas=15;
$sangrePorVictima=1;

$sangreTotal=$victimas * $sangrePorVictima;

if ($sangreTotal>=10){
    echo "¡Drácula está satisfecho con ".$sangreTotal." litros de sangre!";
}else{
    echo "¡Drácula necesita más víctimas!";
}