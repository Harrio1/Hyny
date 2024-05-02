<?php
// выход из полльзователя и очистка сессии 
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: login.php");
exit();


?>