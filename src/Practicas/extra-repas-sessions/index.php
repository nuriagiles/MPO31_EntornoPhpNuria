<?php

    //Iniciamos sesion
    session_start();
    
    //Si no existe el array basura, la creamos.
    if (!isset($_SESSION["Basura"])) {
        // Creamos un array con los tipos de basura, incluyendo duplicados y lo metemos dentro de sesion
        $_SESSION["Basura"] = [ "plastico", "organico", "papel", "vidrio", "plastico", "papel" ];
    }

    //Si se ha enviado el formulario (POST) o si se ha hecho click en el boton de eliminar basura ($_POST[])
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"])){

        //metemos el valor recibido en tipoAEliminar
        $tipoAElminar = $_POST["accion"];
       
        //Repasamos el array que esta dentro del array de sesion como index
        foreach ($_SESSION["Basura"] as $index => $tipo) {
            if ($tipo === $tipoAElminar) {
                unset($_SESSION["Basura"][$index]); 
                $_SESSION["Basura"] = array_values($_SESSION["Basura"]); 
                break; 
        }
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contenedor-basura{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .basura{
            width: 100px;
            height: 100px;
            border: 1px solid black;
        }
        table, thead, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php include "include/header.php"; ?>
    <main>
        <hr>
        <h1>Gestionar Reciclaje</h1>
        <div class="contenedor-basura">
            <?php
                if (empty($_SESSION["Basura"])) {
                    echo "<p>¡Has reciclado toda la basura!</p>";
                } else {
                    foreach ($_SESSION["Basura"] as $index => $basura) {
                        echo "<div class='basura' id='basura-" . $index . "'>" . $basura . "</div>";
                    }
                }
            ?>
        </div>
        <form action="index.php" method="POST">

            <button type="submit" name="accion" value="organico">Organico</button>
            <button type="submit" name="accion" value="plastico">Plastico</button>
            <button type="submit" name="accion" value="papel">Papel</button>
            <button type="submit" name="accion" value="vidrio">Vidrio</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Tipo de Basura</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>a</td>
                </tr>
            </tbody>
        </table>
    </main>
    <?php  
        include "include/footer.php";
    ?>
</body>
</html>