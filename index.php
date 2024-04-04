<?php include "components/check_auth.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продуктовая витрина</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/buttton.css">
</head>
<body>
    <header>
        <h1>Смачный Смех</h1>  
        <a href="login.php" class="account-button">Войти</a>
        <div id="copyNotification" class="copy-notification"></div>
    </header>

   
    <div class="container">
        <div class="product">
            <img src="продукты/арбуз.jpg" alt="Продукт 1">
            <h2 class="cent">Арбузы</h2>
            <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php" > Показать номер</a></span></p>
            <p>Цена: 15.99 р.</p> 
        </div>
        <div class="product">
            <img src="продукты/бананы.jpg" alt="Продукт 2">
            <h2 class="cent">бананы </h2>
            <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php">Показать номер</a> </span></p>
            <p>Цена: 191.99 р.</p>
        </div>
        <div class="product">
            <img src="продукты/Дыня.jpeg" alt="Продукт 3">
            <h2 class="cent">Дыни</h2>
            <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php">Показать номер</a> </span></p>
            <p>Цена: 89.99 р.</p>
        </div>
            </div>
            <div class="container">
                <div class="product">
                    <img src="продукты/морковь.jpg" alt="Продукт 1">
                    <h2 class="cent">Морковковки</h2>
                    <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php"> Показать номер</a></span></p>
                    <p>Цена: 59.99 р.</p> 
                </div>
                <div class="product">
                    <img src="продукты/огурец.jpg" alt="Продукт 2">
                    <h2 class="cent">Огурецы </h2>
                    <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php">Показать номер</a> </span></p>
                    <p>Цена: 80.99 р</p>
                </div>
                <div class="product">
                    <img src="продукты/помидоры.jpg" alt="Продукт 3">
                    <h2 class="cent">Помидоры</h2>
                    <p>Для заказа товра обращайтесь по этому номеру: <span id="phoneNumber" class="phoneNumber"><a class="link" href="login.php">Показать номер</a> </span></p>
                    <p>Цена: 78.99 р.</p>
                </div>
                <div id="copyNotification" class="copy-notification"></div>
                    </div>
        

        <?php include "components/footer.php"; ?>

</body>
</html>

