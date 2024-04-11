<?php  

include "components/header.php";
include "components/connectdb.php";

$user = $_SESSION['user'];

echo '<div class="centered-text">
  <p><strong>Логин:</strong>' . $user['username'] . '</p>
  <p><strong>Email:</strong>' . $user['email'] . '</p>
  <p><strong>Телефон:</strong>' . $user['phone'] . '</p>
  <p><strong>Пол:</strong>' . $user['gender'] . '</p>
 <a href="edit_profile.php" class="button">Редактировать профиль</a>;
  
</div>';




?>




