<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php">
        <label>
            Nombre:
            <input type="text" name="nombre">
        </label>

        <label>
            Teléfono:
            <input type="text" name="telefono">
        </label>

        <label>
            Foto de perfil:
            <input type="text" name="foto">
        </label>
                
        <button type="submit">Enviar</button>
        
    </form>
    
        
    <?php if(isset($_GET['nombre'])){
        echo ($_GET['nombre']);
        echo ($_GET['telefono']);
        echo ('<img src="' . $_GET['foto'] . '">');
    }
        
    ?>
</body>
</html>