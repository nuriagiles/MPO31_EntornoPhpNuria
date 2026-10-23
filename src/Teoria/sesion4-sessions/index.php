<?php
    session_start();

    echo("Hola session 4");

    //session_destroy();

    $_SESSION['edad'] = 19;

    echo $_SESSION['edad'];
    echo $_SESSION['name'];
    

?>