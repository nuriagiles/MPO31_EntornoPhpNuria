<?php
require_once 'functions.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    eliminarLibro($id);
}

header("Location: home.php");
exit;
