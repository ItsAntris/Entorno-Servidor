<?php
    $dia=24;
    $anio=365;
    $nAnios=14;
    $nHoras;

    function calculoHoras() {
        global $anio, $nAnios, $dia, $nHoras;
        $nHoras=$anio*$nAnios*$dia;
        echo $nHoras;
    }

    calculoHoras();

