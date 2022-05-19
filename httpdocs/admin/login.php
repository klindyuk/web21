<?php
session_start();

require_once '../../lib/connection.php';
if (isset($_POST['login_submit'])) {
    $login = $_POST["login"];
    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `login`=\"$login\";"); 
    if ($result) $user = mysqli_fetch_assoc($result);
    else echo 'Ошибка';
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_id'] = $user['id'];
        header("Location: product.php");
        exit;
    } else {
        echo 'Логин или пароль введены неверно';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Вход</title>
</head>
<body>
    <div class="login">
    <form action="login.php" method="post" name="login_form" class="login_form">
        <div class="form_control">
            <input type="text" name="login" id="login" placeholder="Логин" require>
        </div>
        <div class="form_control">
            <input type="password" name="password" id="password" placeholder="Пароль" require>
        </div>
        <div class="form_control">
            <input type="submit" name="login_submit" value="Вход">
        </div>
    </form>
    </div>
</body>
</html>