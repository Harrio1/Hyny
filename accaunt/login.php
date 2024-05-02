<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>

  <h1>Вход</h1>

  <?php

// Подключение к БД
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ku";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка подключения
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}

// Обработка формы
if($_SERVER["REQUEST_METHOD"] == "POST") {

  // Получаем данные
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Проверка на email
  if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
    // Поиск по email
    $sql = "SELECT * FROM users WHERE email = '$username'"; 
  } else {
    // Поиск по username
    $sql = "SELECT * FROM users WHERE username = '$username'";
  }
  
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
      // Стартуем сессию и сохраняем пользователя в сессии
      session_start();
      $_SESSION['user'] = $row;
      header("Location: ../vxod.php"); 
      exit();
    } else {
      echo "<p>Неверный логин или пароль.</p>";
    }
  } else {
    echo "<p>Неверный логин или пароль.</p>";
  }
}

?>
  <form method="post">
    <label>Логин:</label><br>
    <input type="text" name="username"><br>

    <label>Пароль:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Войти">
  </form>
  <p class="p1"> Нет аккаунт? <a href="../regbd.php" >Нажмите сюда</a></p>
</body>
</html>
