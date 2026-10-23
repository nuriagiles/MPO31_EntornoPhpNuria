<?php

if(!isset($_SESSION['username'])){
    //vete a tomar viento
    header('Location: login.php');
    exit;
}



$_SESSION['alumnes'] =['joan', 'miguel', 'pedro', 'david'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">CERRAR SESION</a>
</body>
</html>
