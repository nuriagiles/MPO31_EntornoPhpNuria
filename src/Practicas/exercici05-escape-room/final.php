<?php

session_start();

if (!isset($_SESSION['identificat']) || $_SESSION['identificat'] !== true || !isset($_SESSION['index_actual']) || $_SESSION['index_actual'] < 3) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['reiniciar'])) {
    session_unset();    
    session_destroy();  
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Jugador";
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://jsdelivr.net" rel="stylesheet">
    <title>Joc Completat</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(https://unsplash.com); background-size: cover; background-repeat: no-repeat; background-position: center;">

    
    <div class="card p-4 bg-dark text-white shadow-lg text-center border-0" style="width: 26rem; border-top: 5px solid #198754 !important;">
        <div class="card-body">            
            <h2 class="card-title text-success fw-bolder mb-3 text-uppercase tracking-wide">¡Missió Complerta!</h2>
            <h5 class="text-light opacity-75 mb-4">Felicitats, <?= $username ?></h5>
            
            <div class="alert alert-success bg-success bg-opacity-10 text-success border border-success border-opacity-25 py-3 mb-4" role="alert">
                <p class="card-text fs-5 mb-0 fw-bold">
                    L'Escape Room s'ha completat!
                </p>
                <span class="small opacity-75">Has aconseguit resoldre totes les endevinalles de la Habitacion 5.</span>
            </div>
            
            <hr class="card p-4 bg-dark text-white shadow-lg text-center border-0" style="width: 26rem; border-top: 5px solid #198754 !important;">

            <form method="POST">
                <button type="submit" name="reiniciar" class="btn btn-success w-100 fw-bold py-3 text-uppercase shadow">
                    Tornar a jugar
                </button>
            </form>
        </div>
    </div>

</body>
</html>

