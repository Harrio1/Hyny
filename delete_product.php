<?php
session_start();

// Проверяем, вошел ли пользователь в систему
if (!isset($_SESSION['user'])) {
    header('Location: ../accaunt/login.php');
    exit();
}

// Проверяем, является ли пользователь администратором
if ($_SESSION['user']['role'] !== 'admin') {
    echo "У вас нет прав для удаления продуктов.";
    exit();
}

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

// Получаем идентификатор продукта для удаления
$productId = $_POST['id'];

// SQL-запрос для удаления продукта
$sql = "DELETE FROM product WHERE id = $productId";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully";
} else {
    echo "Error deleting product: " . $conn->error;
}

$conn->close();
?>
