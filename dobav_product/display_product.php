<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/buttton.css">
</head>
<body>
    

<?php
// Проверяем, не запущена ли сессия
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Проверяем, вошел ли пользователь в систему
if (!isset($_SESSION['user'])) {
    header('Location: ../accaunt/login.php');
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

// SQL-запрос для получения всех продуктов
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Вывод продуктов на странице
while ($row = $result->fetch_assoc()) {
    echo '<div class="product" id="product_' . $row['id'] . '">' . "\n";
    // Вывод информации о продукте
    echo '<h2>' . $row['name'] . '</h2>' . "\n";
    if (strlen($row['description']) > 100) {
        $truncated_description = substr($row['description'], 0, 100);
        echo '<p class="description" style="white-space: pre-line;">' . $truncated_description . '<br><span style="color: red;">Превышен лимит символов</span></p>' . "\n";
    } else {
        echo '<p class="description">' . $row['description'] . '</p>' . "\n";
    }
    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">' . "\n";
    echo '<p>Цена: ' . $row['price'] . ' р.</p>' . "\n";
    // Проверяем роль пользователя перед отображением кнопки удаления
    if ($_SESSION['user']['role'] === 'admin') {
        echo '<p><button onclick="deleteProduct(' . $row['id'] . ')" class="button">Удалить продукт</button></p>' . "\n";
    }
    echo '</div>' . "\n";
}

$conn->close();
?>

<script>
// Определяем функцию deleteProduct()
function deleteProduct(productId) {
    if (!productId) {
        console.error("Не удалось получить идентификатор продукта.");
        return;
    }
    if (confirm("Вы уверены, что хотите удалить этот продукт?")) {
        // Создаем новый объект XMLHttpRequest
        var xhr = new XMLHttpRequest();
        // Настраиваем запрос
        xhr.open("POST", "../delete_product.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // Отлавливаем событие изменения состояния запроса
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                console.log(xhr.responseText); // Выводим ответ сервера в консоль для отладки
                if (xhr.status === 200) {
                    // Успешно удалено
                    document.getElementById("product_" + productId).remove();
                } else {
                    // Возникла ошибка
                    alert("Ошибка при удалении продукта.");
                }
            }
        };
        // Отправляем данные
        xhr.send("id=" + productId);
    }
}
</script>
</body>
</html>
