<?php
require_once "04-multidimensional.php";
    $alumnos = [
        [
            "nombre" => "Ivan",
            "edad" => 20
        ], 
        [
            "nombre" => "Nuria",
            "edad" => 20,
        ]];
    $conceptes = [
        [
            "titol" => "Foreach en php",
            "descripcio" => "adijawdj",
            "imatge" => "aiwdjoawdji",
            "modul" => "M487",
            "destacat" => true
        ]
    ]

    //mostrar el array print_r($lista);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        var_dump($alumnos);
    if(isset($_GET['nom'])){
        echo ($_GET['nom']);
        echo ($_GET['id']);
        
    }

    ?>
</body>
</html>