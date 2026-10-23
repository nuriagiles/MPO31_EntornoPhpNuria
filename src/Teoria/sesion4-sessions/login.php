<?php
session_start();

// echo $_SESSION['username'];

$userCorrecte = "pepe";
$passwordCorrecte = password_hash("12345", PASSWORD_DEFAULT);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuari = $POST["usuari"] ?? "";
    $password = $_POST["password"] ?? "";
    if($usuari === $userCorrecte && password_verify($password, $passwordCorrecte)){
        echo 'vamos bien';
        //ahora tocaria
        //1. guardar en sesion
        $_SESSION['username'] = $usuari;

        //2. reedireccionar
        header('Location: inici.php');
        exit;
    }else{
        //Si el login es incorrecto
        echo 'user o password equivocado';
    }
    //unset($_SESSION['edad']);
}

?>

<form action="" method="POST">
    <label>
        User:
        <input type="text" name="usuari">
    </label>
    <label>
        Password:
        <input type="text" name="password">
    </label>
    <button type="submit">enviar</button>
</form>