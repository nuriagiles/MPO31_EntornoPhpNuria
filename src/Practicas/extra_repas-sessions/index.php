<?php   
    $Basura = [ "plastico", "organico", "papel", "vidrio"];

    session_start();
    include "funciones.php";

    $_SESSION["Basura"] = $Basura;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["accion"]) == "organico"){
            $Valor_eliminar = $_POST["accion"];

            array_shift($_SESSION["Basura"]);

            header("Location: index.php");
            exit;
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
    </style>
</head>
<body>
    <?php include "include/header.php"; ?>
    <main>
        <hr>
        <h1>Gestionar Reciclaje</h1>
        <div class="contenedor-basura">
            <?php
                foreach ($_SESSION["Basura"] as $basura) {
                    echo "<div class='basura' id='$basura'>$basura</div>";
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

        </table>
    </main>
    <?php  
        include "include/footer.php";
    ?>
</body>
</html>