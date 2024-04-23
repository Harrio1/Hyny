<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    
    <link rel="stylesheet" href="/css/do.css">
    <link rel="stylesheet" href="/css/acc.css">
    <script>
    function formatPhoneNumber(input) 
        var phoneNumber = input.value.replace(/\D/g, ''); // Удаляем все символы, кроме цифр
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    
    <link rel="stylesheet" href="/css/do.css">
    <script>
    function formatPhoneNumber(input) {
        var phoneNumber = input.value.replace(/\D/g, ''); // Удаляем все символы, кроме цифр
        var maxLength = 11; // Ограничиваем длину номера телефона
        phoneNumber = phoneNumber.slice(0, maxLength);
        var formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3-$4-$5'); // Добавляем пробелы или другой форматированный вид номера телефона, если необходимо
        input.value = formattedPhoneNumber; // Устанавливаем отформатированный номер обратно в поле ввода
    }
    </script>
</head>
<body>
    <h1>Добавление нового продукта</h1>
    <form action="add_product_process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Наиминование продукта:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Описание:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="image">Фото продукта:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        <label for="price">Цена:</label><br>
        <input type="text" id="price" name="price" required><br>
        <label for="phone">Номер телефона:</label><br>
        <input type="text" id="phone" name="phone" maxlength="16" oninput="formatPhoneNumber(this)"><br>
        <button class="button" type="submit">Добавить продукт</button>
    </form>

    <div class="products-container">
    <?php
    // Вывод продуктов на странице
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        // Вывод информации о продукте
        echo '</div>';
    }
    ?>
    </div>

    <div id="copyNotification" class="copy-notification"></div>
    
   
    <a href="../vxod.php" class="account-button" style="margin-top: 20px;">Выход</a>
<?php
$conn->close();
?>
</body>
</html>