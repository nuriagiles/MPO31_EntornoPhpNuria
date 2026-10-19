<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadona - inicio</title>
</head>

<body>
    <?php 
        include_once "includes/header.php";
    ?>
    <?php
        include_once "includes/funciones.php";
        include_once "data/productos.php";

        generarTablaProductos($productos);
        muestraInfoContacto($_GET['nombre'], $_GET['telefono'], $_GET['foto']);
    ?>
    <?php
        include_once "includes/footer.php";
    ?>
</body>
</html>