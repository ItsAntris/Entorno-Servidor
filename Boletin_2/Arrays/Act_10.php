<?php

$inventarioLibros = [
    [
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "anio_publicacion" => 1967
    ],
    [
        "titulo" => "Don Quijote de la Mancha",
        "autor" => "Miguel de Cervantes",
        "anio_publicacion" => 1605
    ],
    [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "anio_publicacion" => 1949
    ],
    [
        "titulo" => "El amor en los tiempos del cólera",
        "autor" => "Gabriel García Márquez",
        "anio_publicacion" => 1985
    ]
];

foreach ($inventarioLibros as $libro) {
    echo "Título: " . $libro["titulo"] . "\n";
    echo "Autor: " . $libro["autor"] . "\n";
    echo "Año de publicación: " . $libro["anio_publicacion"] . "\n";
    echo "----------------------\n";
}
