<?php  
  include "../components/header.php";
  include "../components/connectdb.php";

  // Получаем данные текущего пользователя
  $user = $_SESSION['user'];

  // Обработка формы при submit
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Получаем новые данные из формы
    $new_username = $_POST['username'];
    $new_phone = $_POST['phone'];

    // Обновляем данные в БД
    $sql = "UPDATE users SET username='$new_username', phone='$new_phone' WHERE id=$user[id]";

    if(mysqli_query($conn, $sql)) {
      $_SESSION['user']['username'] = $new_username;
      $_SESSION['user']['phone'] = $new_phone;
      header('Location: acc.php'); 
    }

  }

  // Форма для ввода новых данных
  echo '<form method="post" class="centered-text">

  <p><strong>Логин:</strong><input name="username" class="edit-form" value="'.$user['username'].'"> </p>
  
  <p><strong>Email:</strong> '.$user["email"].'</p>
  
  <p><strong>Телефон:</strong> <input name="phone" class="edit-form" value="'.$user['phone'].'"></p>

  <p><strong>Пол:</strong> '.$user["gender"].'</p>

  <button type="submit" class="button">Сохранить</button>

</form>';

?>
<?php include "../components/footer.php";?>
