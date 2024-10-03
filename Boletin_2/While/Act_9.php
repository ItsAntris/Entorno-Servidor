<?php

$num = 10;
$factorial = 1; // Inicia en 1 ya que el factorial de 0 es 1

while($num > 0){
    $factorial *= $num;
    $num--;
}

echo $factorial;
