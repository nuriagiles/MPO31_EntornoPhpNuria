<?php
session_start();

$usuarios = [
    ["username" => "admin", "password" => "adminpass", "role" => "admin"],
    ["username" => "reader", "password" => "readerpass", "role" => "lector"]
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";
    $photo = isset($_POST['photo']) ? trim($_POST['photo']) : "";

    if (empty($photo)) {
        $photo = "https://static.wikitide.net/nullscapewiki/4/47/Placeholder.png";
    }

    $autenticado = false;

    foreach ($usuarios as $u) {
        if ($u['username'] === $username && $u['password'] === $password) {
            $_SESSION['username'] = $u['username'];
            $_SESSION['role'] = $u['role'];
            $_SESSION['photo'] = $photo;
            $autenticado = true;
            break;
        }
    }

    if ($autenticado) {
        header("Location: home.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Login</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section>
        <?php for ($i = 0; $i < 180; $i++): ?>
            <span></span>
        <?php endfor; ?>

        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="POST" action="login.php">
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Username" type="text" name="username" required>
                       
                    </div>
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Password" type="password" name="password" required>
                       
                    </div>
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Foto de perfil (URL)" type="url" name="photo">
                       
                    </div>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <div class="inputBox">
                        <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
