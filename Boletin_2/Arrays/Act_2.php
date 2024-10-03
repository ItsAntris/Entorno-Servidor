<?php

$array=[5, 6, 7];
$mayor=$array[0];

foreach ($array as $value) {
    if ($value>$mayor) {
        $mayor=$value;
    }
}

echo $mayor;