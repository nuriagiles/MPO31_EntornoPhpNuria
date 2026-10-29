<?php

session_start();

if (!isset($_SESSION['identificat']) || $_SESSION['identificat'] !== true) {
    header("Location: login.php");
    exit();
}


require_once 'dades.php';

if (!isset($_SESSION['ordre_nivells'])) {
    $_SESSION['ordre_nivells'] = ["Nivel-Facil", "Nivel-Intermedio", "Nivel-Dificil"];
    
    $index_inicial = array_search($_SESSION['dificultat'], $_SESSION['ordre_nivells']); //Array_search => busca un valor específico dentro de un array y devuelve la clave al primer elemento que coincida (lit me ahorra hacer un foreach, lol)
    $_SESSION['index_actual'] = ($index_inicial !== false) ? $index_inicial : 0;
}

if ($_SESSION['index_actual'] >= count($_SESSION['ordre_nivells'])) {
    header("Location: final.php");
    exit();
}

$nivell_actual = $_SESSION['ordre_nivells'][$_SESSION['index_actual']];
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_POST['answer']) || trim($_POST['answer']) === "") {
        $message = '<div class="text-danger text-center mt-2 small fw-bold">Siusplau, escriu una resposta!</div>';
    } else {
        $resposta_usuari = mb_strtolower(trim($_POST['answer']), 'UTF-8'); //Recuerda que es como en js, toLowerCase()
        
        $resposta_correcta_text = "";
        foreach ($Niveles[$nivell_actual]['Repuestas'] as $text_opcio => $es_correcta) {
            if ($es_correcta === true) {
                $resposta_correcta_text = mb_strtolower(trim($text_opcio), 'UTF-8');
                break;
            }
        }
        
        if ($resposta_usuari === $resposta_correcta_text) {
            
            $_SESSION['index_actual']++;
            
            if ($_SESSION['index_actual'] >= count($_SESSION['ordre_nivells'])) {
                header("Location: final.php");
                exit();
            }
            
            header("Location: joc.php");
            exit();
            
        } else {
            $message = '<div class="text-danger text-center mt-2 small fw-bold">Resposta incorrecta! Torna-ho a intentar.</div>';
        }
    }
}

$dades_endevinalla = $Niveles[$nivell_actual]['Endevinalles'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 5</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación 5</h2>
        
        <p class="card-text"><strong>Endevinalla:</strong> <?= $dades_endevinalla; ?></p>
        
        <form method="POST" autocomplete="off">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        
        <?= $message; ?> 
    </div>
</body>
</html>

