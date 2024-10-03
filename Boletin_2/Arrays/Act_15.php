<?php

$inventarioLibros = [
    [
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "anio_publicacion" => 1967,
        "palabras" => ["Marquez", "Soledad"]
    ],
    [
        "titulo" => "Don Quijote de la Mancha",
        "autor" => "Miguel de Cervantes",
        "anio_publicacion" => 1605,
        "palabras" => ["Quijote", "Cervantes"]
    ],
    [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "anio_publicacion" => 1949,
        "palabras" => ["Orwell", "1984"]
    ],
    [
        "titulo" => "El amor en los tiempos del cólera",
        "autor" => "Gabriel García Márquez",
        "anio_publicacion" => 1985,
        "palabras" => ["cólera", "Márquez"]
    ]
];

foreach ($inventarioLibros as $libro) {
    echo "Título: " . $libro["titulo"]."\n";
}