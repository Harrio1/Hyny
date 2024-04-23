<?php
?>
<?php include "components/header.php"; ?>

<?php include 'dobav_product/display_product.php'; ?>
<!-- Кнопка для добавления продукта -->

<?php
// Проверяем, авторизован ли пользователь
if(isset($_SESSION['user'])) {
    $user_role = $_SESSION['user']['role'];
    // Если уровень доступа пользователя - администратор, отображаем кнопку добавления продуктов
    if($user_role === 'admin') {
        echo '<a href="../dobav_product/add_product.php" class="product-button">Добавить продукт</a>';
    }
}
?>

<?php include "components/footer.php"; ?>
