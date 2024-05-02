<?php
// Проверяем, запущена ли сессия
if (session_status() === PHP_SESSION_NONE) {
    // Если сессия не была запущена, запускаем ее
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../accaunt/login.php');
        exit();
    }
}
?>