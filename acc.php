<?php  include "components/header.php";

include "components/connectdb.php";
// Получение информации о текущем пользователе из сессии
$user = $_SESSION['user'];

// Поиск пользователя в базе данных
// $sql = "SELECT * FROM users WHERE username = '$currentUsername'";
// $result = mysqli_query($conn, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $password = $row['password'];
//     $phone = $row['phone'];
//     $gender = $row['gender'];

//     // Вывод информации о пользователе
//     echo "<p><strong>Логин:</strong> $currentUsername</p>";
//     echo "<p><strong>Пароль:</strong> $password</p>";
//     echo "<p><strong>Телефон:</strong> $phone</p>";
//     echo "<p><strong>Пол:</strong> $gender</p>";
// } else {
//     echo "Пользователь не найден.";
// }

// mysqli_close($conn);
?>


<div class="centered-text">
    <p><strong>Логин:</strong><?= $user['username']; ?></p>
    <p><strong>Email:</strong><?=  $user['email']; ?></p>
    <p><strong>Телефон:</strong><?=  $user['phone']; ?></p>
    <p><strong>Пол:</strong><?=  $user['gender']; ?></p>
</div>



<?php include "components/footer.php";?>


