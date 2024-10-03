<?php

$array=[
    "Nombre" => "Juan",
    "Edad" => 30,
    "Email" => "juan@gmail.com",
    "Suscriptor" => true
];

foreach ($array as $key => $value) {
    echo "$key: $value\n";
}