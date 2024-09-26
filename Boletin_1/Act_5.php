<?php
$milla=1.852;
$nMillas=54;

$nMetros;

function calculo(){
    global $milla, $nMillas, $nHoras, $nMetros;

    echo $nMetros=$milla*$nMillas;
}

calculo();