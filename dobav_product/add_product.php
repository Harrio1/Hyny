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
</head>
<body>
    <h1>Add New Product</h1>
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
        <button class="account-button" type="submit">Добавить продукт</button>
    </form>

    
</body>
</html>
