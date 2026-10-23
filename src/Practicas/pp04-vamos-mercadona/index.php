<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadona - inicio</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .container-stock-info{
            display: flex;
            flex-direction: column;
            width: fit-content;

        }
        .tarjetas-container{
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 20px; 
        }
        .tarjetas-stock{
            border: 1px solid black;
            border-radius: 10px;
            height: 400px; 
            padding: 20px;
            align-content: center;
        }
        .tarjetas-datos{
            display: flex;
            border: 1px solid black;
            width: fit-content;
            padding: 20px;
            border-radius: 10px;
            margin-top: 100px;
            margin-bottom: 100px;
            align-items: center;
        }
        .tarjetas-datos img{
            width: 400px;
        }
        .container-stock-info{
            justify-self: center;
        }
        footer{
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <?php 
        include_once "includes/header.php";
    ?>
    <?php
        include_once "includes/funciones.php";
        include_once "data/productos.php";

        echo("<div class=\"container-stock-info\">");
            echo("<div class=\"tarjetas-container\">"); 
                generarTablaProductos($productos);
            echo("</div>");    
                muestraInfoContacto($_GET['nombre'], $_GET['telefono'], $_GET['foto']);
        echo("</div>"); 
        
    ?>
    <?php
        include_once "includes/footer.php";
    ?>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>