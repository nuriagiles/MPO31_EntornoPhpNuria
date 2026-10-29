<?php

session_start();

if (isset($_SESSION['identificat']) && $_SESSION['identificat'] === true) {
    header("Location: joc.php");
    exit();
}

$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $dificultat = isset($_POST['dificultat']) ? $_POST['dificultat'] : "";

    if (empty($username)) {
        $error = "El nom d'usuari no pot estar buit.";
    } elseif (empty($dificultat)) {
        $error = "Has de seleccionar un nivell de dificultat.";
    } else {
        
        $_SESSION['username'] = $username;
        $_SESSION['dificultat'] = $dificultat;
        
        $_SESSION['identificat'] = true;

        header("Location: joc.php");
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inici</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(https://unsplash.com); background-size: cover; background-repeat: no-repeat; background-position: center;">
    
    <div class="card p-4 bg-dark text-white shadow-lg" style="width: 22rem;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Benvingut!</h2>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger p-2 text-center small" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" autocomplete="off"> 
                <div class="mb-3">
                    <label for="username" class="form-label">Nom:</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" required>
                </div>
                
                <div class="mb-4">
                    <label for="dificultat" class="form-label">Nivell de Dificultat:</label>
                    <select name="dificultat" id="dificultat" class="form-select" required>
                        <option value="">Selecciona un nivell</option>
                        <option value="Nivel-Facil">Fàcil</option>
                        <option value="Nivel-Intermedio">Mig</option>
                        <option value="Nivel-Dificil">Difícil</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 fw-bold">Comença el Joc</button>
            </form>
        </div>
    </div>

</body>
</html>
