<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="/css/reg.css">
</head>
<body>
<h1>Регистрация</h1>

<script>
    function formatPhoneNumber(input) {
        var phoneNumber = input.value.replace(/\D/g, ''); // Удаляем все символы, кроме цифр

        // Ограничиваем длину номера телефона
        var maxLength = 11;
        phoneNumber = phoneNumber.slice(0, maxLength);

        // Добавляем пробелы или другой форматированный вид номера телефона, если необходимо
        var formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3-$4-$5');

        // Устанавливаем отформатированный номер обратно в поле ввода
        input.value = formattedPhoneNumber;
    }

    function validateForm() {
        // Ваша логика проверки формы, если необходимо
    }
</script>

<?php
    // Подключение к базе данных
    $servername = "localhost"; // Имя сервера базы данных
    $username = "root"; // Имя пользователя базы данных
    $password = ""; // Пароль для доступа к базе данных
    $dbname = "ku"; // Имя базы данных

    // Создание подключения
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка подключения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Обработка данных из формы регистрации
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $gender = $_POST['gender'];

        // Проверка, что все поля формы заполнены
        if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password) || empty($gender)) {
            echo "<div>Ошибка: Все поля формы должны быть заполнены.</div>";
        } else {
            // Проверка совпадения пароля и его подтверждения
            if ($password != $confirm_password) {
                echo "<div>Ошибка: Пароль и подтверждение пароля не совпадают.</div>";
            } else {
                // Хэширование пароля
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Проверяем, существует ли пользователь с таким же именем пользователя или адресом электронной почты
                $check_query = "SELECT * FROM Users WHERE username = '$username' OR email = '$email'";
                $result = $conn->query($check_query);

                if ($result->num_rows > 0) {
                    // Пользователь уже существует, выводим сообщение об ошибке
                    echo "<div>Ошибка: Пользователь с таким именем пользователя или адресом электронной почты уже зарегистрирован.</div>";
                } else {
                    // Пользователь не существует, выполняем вставку данных в базу данных
                    $sql = "INSERT INTO `Users` (`username`, `email`, `phone`, `password`, `gender`) VALUES ('$username', '$email', '$phone', '$hashed_password', '$gender')";
                    
                    if ($conn->query($sql) === TRUE) {
                        // Редирект на страницу входа после успешной регистрации
                        header("Location: ../accaunt/login.php");
                        exit();
                    } else {
                        echo "Ошибка: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }

    // Закрытие подключения к базе данных
    $conn->close();
?>

<form action="regbd.php" method="post" onsubmit="return validateForm()">
    <label for="Here's the modified HTML code to change the gender field from radio buttons to a dropdown block:

<form action="regbd.php" method="post" onsubmit="return validateForm()">
    <label for="username">Имя пользователя:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="email">Электронная почта:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="phone">Номер телефона:</label><br>
    <input type="text" id="phone" name="phone" maxlength="16" oninput="formatPhoneNumber(this)"><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password"><br>
    <label for="confirm_password">Повторите пароль:</label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br>
    <label for="gender">Пол:</label><br>
    <select id="gender" name="gender">
        <option value="male">Мужской</option>
        <option value="female">Женский</option>
    </select><br>
    <!-- Кнопка отправки формы -->
    <input type="submit" value="Зарегистрироваться">
</form>
<p class="p1"> есть аккаунт? <a href="../accaunt/login.php" >Нажмите сюда</a></p>