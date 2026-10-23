<?php
    session_start();

    if(isset($_POST['user'])){
        $_SESSION['username'] = $_POST['user'];
    }

    // Solo ceptamos POST 
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){ 
        $_SESSION['username'] = $_POST['user'];
    }else{
        header('Location: login.php');
        exit;
    }
?>


    <form action="" method="GET">
        <label>
            Username
            <input type="text" name="user">
        </label>
        <button type="submit">Enviar</button>
    </form>
