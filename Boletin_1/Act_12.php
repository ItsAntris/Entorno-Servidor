<?php

for ($i = 1; $i <= 9; $i++) {
    if ($i == 1 || $i == 9) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*"; 
        }
    } else {
        echo "*";
        for ($j = 1; $j < $i - 1; $j++) {
            echo " ";
        }
        if ($i > 1) {
            echo "*"; 
        }
    }
    echo "\n";
}

//Ayudado por el chat