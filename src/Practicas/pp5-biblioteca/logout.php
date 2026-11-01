<?php
session_start();


unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['photo']);


header("Location: login.php");
exit;
