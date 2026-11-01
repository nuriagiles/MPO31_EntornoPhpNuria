<?php
require_once 'functions.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$isAdmin = ($_SESSION['role'] === 'admin');

$libros = isset($_SESSION['libros']) ? $_SESSION['libros'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?php echo $_SESSION['photo']; ?>" alt="Foto de perfil" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                    <h4 class="m-0"> Bienvenido, <?php echo $_SESSION['username']; ?>!</h4>
                    <?php if ($isAdmin): ?>
                        <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> Admin </p>
                    <?php else: ?>
                        <p class="text-muted m-0">Lector</p>
                    <?php endif; ?>
                </div>
            </div>
            <a href="logout.php" class="btn btn-warning btn-sm">
               Cerrar sesión 
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>

        <?php if ($isAdmin): ?>
            <div class="text-center mb-4">
                <a href="add_edit_book.php" class="btn btn-outline-success btn-lg">
                    <i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Libro
                </a>
            </div>
        <?php endif; ?>


        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (empty($libros)): ?>
                <div class="col-12 text-center my-4">
                    <p class="text-muted lead">No hay libros disponibles en este momento.</p>
                </div>
            <?php else: ?>
                <?php foreach ($libros as $id => $libro): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo $libro['imagen']; ?>" class="card-img-top" alt="Portada de <?php echo $libro['titulo']; ?>" style="height: 400px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
                                <p class="card-text"><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
                                <p class="card-text"><?php echo $libro['descripcion']; ?></p>
                            </div>
                          
                            <?php if ($isAdmin): ?>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="add_edit_book.php?id=<?php echo $id; ?>" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="delete_book.php?id=<?php echo $id; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este libro?');">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
