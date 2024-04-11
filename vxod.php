<?php include "components/header.php"; ?>

<div class="container">
    <div class="product">
        <?php include 'dobav_product/display_product.php'; ?>
    </div>
    <div id="copyNotification" class="copy-notification"></div>
    <!-- Кнопка для добавления продукта -->
    <a class="product-button" onclick="window.location.href='add_product.php'">Добавить продукт</a>
</div>

<script src="phonecopy.js"></script>

<?php include "components/footer.php"; ?>
