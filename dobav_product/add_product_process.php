<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ku";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$phone = $_POST['phone'];

// Получение имени загружаемого файла и генерация уникального имени
$target_dir = "../продукты/";
$imageName = uniqid() . '_' . basename($_FILES["image"]["name"]);
$target_file = $target_dir . $imageName;

// Разрешенные типы файлов
$allowed_types = array('image/jpeg', 'image/png', 'image/gif');

// Получение типа загруженного файла
$file_type = $_FILES["image"]["type"];

// Проверка разрешенных типов файлов
if (in_array($file_type, $allowed_types)) {
    // Перемещение файла в целевую директорию
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // SQL-запрос для добавления нового продукта в таблицу
        $sql = "INSERT INTO product (name, description, image, price, phone)
        VALUES ('$name', '$description', '$target_file', $price, '$phone')";

        if ($conn->query($sql) === TRUE) {
            // Создаем отдельный div с классом product
            echo '<div class="container" style="display: inline-block; width: 240px;">';
            echo '<div class="product">';
            echo '<h2>' . $name . '</h2>';
            echo '<p class="description">' . $description . '</p>';
            echo '<img src="' . $target_file . '" alt="' . $name . '">';
            echo '<p>Цена: ' . $price . ' р.</p>';
            echo '<p>Телефон: <input type="text" value="' . $phone . '" readonly> <button onclick="copyPhone()">Копировать</button> <button onclick="deleteProduct()">Удалить</button></p>';
            echo '</div>';
            echo '</div>'; // Закрываем контейнер

            // Перенаправление на страницу vxod.php после успешного добавления
            header("Location: ../vxod.php");
            exit(); // Обязательно завершаем скрипт после перенаправления
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Failed to move uploaded file.";
    }
} else {
    echo "Error: Only JPEG, PNG, and GIF files are allowed.";
}

$conn->close();
?>