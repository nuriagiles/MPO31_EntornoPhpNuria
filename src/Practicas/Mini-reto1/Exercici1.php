<?php
    $Equipo1 = "Valencia C. F.";
    $Equipo2 = "Barcelona";
    $Partido = "Copa del rey";
    $GolesEquipo1 = 0;
    $GolesEquipo2 = 5;
    $Goles1Equipo1 = 0;
    $Goles2Equipo2 = 5;
    $Fecha = "6/9/2023";
    $Fecha2 = "6/2/2025";
    $Fecha3 = "31/1/2027";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 600px;
            height: 400px;
            border: 1px solid black;
            border-top-left-radius: 11px;
            border-top-right-radius: 11px;
        }
        .title-container{
            width: 578px;
            padding-left: 20px;
            border: 1px solid #212121;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #212121;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title-container">
           <h1><?= $Equipo1 ?> contra <?= $Equipo2 ?></h1> 
        </div>
        
        <div>
            <div>

            </div>
            <div></div>
        </div>
        <div>
            <div></div>
            <div></div>
        </div>
        <div>
            <div></div>
            <div></div>
        </div>
    </div>
</body>
</html>