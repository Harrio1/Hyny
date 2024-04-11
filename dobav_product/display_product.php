

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

// SQL-запрос для получения всех продуктов
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Вывод продуктов на странице
 {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<h2 class="cent">' . $row["name"] . '</h2>';
        echo '<p>Цена: ' . $row["price"] . ' р.</p>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<p>' . $row["phone"] . '</p>';
        echo '</div>';
    }

} 
$conn->close();
?>

