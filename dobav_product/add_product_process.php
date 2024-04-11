<?php
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
$image = $_FILES['image']['name'];
$price = $_POST['price'];
$phone = $_POST['phone'];

// Загрузка файла изображения
$target_dir = "продукты/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

// SQL-запрос для добавления нового продукта в таблицу
$sql = "INSERT INTO product (name, description, image, price, phone)
VALUES ('$name', '$description', '$target_file', $price, '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New product added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
