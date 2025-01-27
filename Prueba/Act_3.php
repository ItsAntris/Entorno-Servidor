<?php

$invitados=array("Jonathan"=>3,"Lucy"=>9,"Van Helsing"=>5);

foreach($invitado as $invitados){
    if ($invitado>=7){
        echo "¡Drácula está satisfecho con ".$sangreTotal." litros de sangre!";
    }else{
        echo "¡Drácula necesita más víctimas!";
    }
}