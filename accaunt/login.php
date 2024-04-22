<?php
session_start();

// Проверка, был ли пользователь уже аутентифицирован
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: vxod.php");
    exit;
}

// Проверка, были ли введены учетные данные
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем введенные учетные данные (вам нужно заменить это на проверку с базой данных)
    $admin_username = "admin"; // Замените это на имя пользователя администратора из вашей базы данных
    $admin_password = "admin123"; // Замените это на пароль администратора из вашей базы данных

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $admin_username && $password === $admin_password) {
        // Если учетные данные верны, устанавливаем флаг аутентификации для администратора
        $_SESSION['admin_logged_in'] = true;
        header("Location: vxod.php");
        exit;
    } else {
        $error = "Неверное имя пользователя или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход для администратора</title>
</head>
<body>
    <h2>Вход для администратора</h2>
    <form method="post">
        <div>
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Войти</button>
    </form>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>
