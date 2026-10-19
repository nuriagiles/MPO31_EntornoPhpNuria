<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button{
            background-color: #00AB61;
            border-style: none;
            border-radius: 5px;
            width: 100px;
            height: 50px;
            color: white;
            align-self: center;
            margin-top: 50px;
        }
        button:hover{
            background-color: #088d4b;
        }
        form{
            display: flex;
            flex-direction: column;
            line-height: 60px;
        }
        .formulario-div{
            justify-self: center;
        }
        label{
            align-self: center;
            display: grid;
        }
        input{
            width: 200px;
            height: 30px;
            border: 1px solid #a8a8a8;
        }
        .formulario-div{
            border: 1px solid #a8a8a8;
            width: 500px; 
            padding: 20px 20px 30px 20px;
            border-radius: 20px;
        }
        header{
            padding: 20px 0px 100px 50px;
        }
        h2{
            color: #3a3939;
            padding-left: 30px;
        }
    </style>
</head>
<body>
    <header>
        <img src="data/assets/mercadona.png" alt="" width="250">
    </header>
    <div class="formulario-div">
        <form action="index.php">
            <h2>Por favor, identificate.</h2>
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
    </div>
    
        
    <?php if(isset($_GET['nombre'])){
        echo ($_GET['nombre']);
        echo ($_GET['telefono']);
        echo ('<img src="' . $_GET['foto'] . '">');        
    }
        
    ?>
</body>
</html>