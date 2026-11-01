<?php
session_start();

require_once 'functions.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$esEdicion = ($id !== null && isset($_SESSION['libros'][$id]));

$titulo = $esEdicion ? $_SESSION['libros'][$id]['titulo'] : '';
$autor = $esEdicion ? $_SESSION['libros'][$id]['autor'] : '';
$imagen = $esEdicion ? $_SESSION['libros'][$id]['imagen'] : '';
$descripcion = $esEdicion ? $_SESSION['libros'][$id]['descripcion'] : '';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postTitulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : "";
    $postAutor = isset($_POST['autor']) ? trim($_POST['autor']) : "";
    $postImagen = isset($_POST['imagen']) ? trim($_POST['imagen']) : "";
    $postDescripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : "";

    if (empty($postTitulo) || empty($postAutor)) {
        $error = "El título y el autor son obligatorios.";
    } else {
        if ($esEdicion) {
            editarLibro($id, $postTitulo, $postAutor, $postImagen, $postDescripcion);
        } else {
            agregarLibro($postTitulo, $postAutor, $postImagen, $postDescripcion);
        }
        
        header("Location: home.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - <?= $esEdicion ? 'Editar Libro' : 'Agregar Libro' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Enlace completo corregido para FontAwesome CDN para asegurar la carga de iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0"> Bienvenido, <?= $_SESSION['username'] ?></h4>
                <p class="text-muted m-0">
                    <i class="fas fa-user-shield text-success"></i> 
                    <?= $_SESSION['role'] === 'admin' ? 'Administrador' : 'Lector ' ?>
                </p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= $esEdicion ? " Editar Libro Existente" : " Añadir Nuevo Libro" ?></h2>
            <p class="lead"><?= $esEdicion ? "Modifica los detalles correspondientes al ejemplar." : "Completa la ficha para registrar la obra en el catálogo virtual." ?></p>
        </div>

        <form method="POST" class="mx-auto" style="max-width: 600px;">
            
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger text-center py-2" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?>" placeholder="Título" required>
                <label for="titulo">Título</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="<?= $autor ?>" placeholder="Autor" required>
                <label for="autor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="url" class="form-control" id="imagen" name="imagen" value="<?= $imagen ?>" placeholder="URL de la Imagen">
                <label for="imagen">URL de la Imagen de Portada</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="height: 150px;"><?= $descripcion ?></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">
                    <?= $esEdicion ? "Guardar Cambios" : "Registrar Libro" ?>
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
