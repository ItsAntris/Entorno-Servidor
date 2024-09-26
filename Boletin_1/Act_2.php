<?php
$lado=6;
$area;

function calculoArea(){
    global $lado, $area;
    echo $area=$lado*$lado;
}

calculoArea();