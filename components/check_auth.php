<?php session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../accaunt/login.php');
        exit();
    }
?>