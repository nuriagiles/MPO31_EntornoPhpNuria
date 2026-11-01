<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [
        [
            "titulo" => "El Quijote",
            "autor" => "Miguel de Cervantes",
            "imagen" => "https://unsplash.com",
            "descripcion" => "Las aventuras del ingenioso hidalgo Don Quijote de la Mancha."
        ],
        [
            "titulo" => "Cien años de soledad",
            "autor" => "Gabriel García Márquez",
            "imagen" => "https://unsplash.com",
            "descripcion" => "La historia de la familia Buendía en el pueblo ficticio de Macondo."
        ]
    ];
}

function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $imgFinal = !empty($imagen) ? $imagen : "https://placeholder.com";
    
    $_SESSION['libros'][] = [
        "titulo" => $titulo,
        "autor" => $autor,
        "imagen" => $imgFinal,
        "descripcion" => $descripcion
    ];
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    if (isset($_SESSION['libros'][$id])) {
        $imgFinal = !empty($imagen) ? $imagen : "https://placeholder.com";
        
        $_SESSION['libros'][$id] = [
            "titulo" => $titulo, 
            "autor" => $autor, 
            "imagen" => $imgFinal, 
            "descripcion" => $descripcion
        ];
    }
}


function eliminarLibro($id) {
    if (isset($_SESSION['libros'][$id])) {
        // Usa unset() para eliminar el libro
        unset($_SESSION['libros'][$id]);
        
        $_SESSION['libros'] = array_values($_SESSION['libros']);
    }
}
