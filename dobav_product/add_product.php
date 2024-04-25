<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    
    <link rel="stylesheet" href="/css/do.css">
    <link rel="stylesheet" href="/css/acc.css">
</head>
<body>
    <h1>Добавление нового продукта</h1>
    <form action="add_product_process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Наименование продукта:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="description" class="description">Описание:</label><br>
        <textarea id="description" name="description" required maxlength="100"></textarea><br>
        <label for="image">Фото продукта:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        <label for="price">Цена:</label><br>
        <input type="text" id="price" name="price" required><br>
        <label for="phone">Номер телефона:</label><br>
        <input type="text" id="phone" name="phone" maxlength="16" oninput="formatPhoneNumber(this)"><br>
        <button class="button" type="submit">Добавить продукт</button>
    </form>

    <!-- Вывод ошибки о превышении лимита символов -->
    <?php
    if (isset($_SESSION['description_error'])) {
        echo '<p style="color: red;">' . $_SESSION['description_error'] . '</p>';
        unset($_SESSION['description_error']); // Очищаем переменную с ошибкой после отображения
    }
    ?>

    <div class="products-container">
        <?php
        // Вывод продуктов на странице
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product" id="product_' . $row['id'] . '">';
            // Вывод информации о продукте
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<p>Цена: ' . $row['price'] . ' р.</p>';
            // Вывод описания продукта
            echo '<p class="description">' . $row['description'] . '</p>';
            // Проверяем роль пользователя перед отображением кнопки удаления
            if ($_SESSION['user']['role'] === 'admin') {
                echo '<p><button onclick="deleteProduct(' . $row['id'] . ')" class="button">Удалить продукт</button></p>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <div id="copyNotification" class="copy-notification"></div>
    
    <a href="../vxod.php" class="accounta-button" style="margin-top: 20px;">Выход</a>
</body>
</html>