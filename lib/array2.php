<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            width: 20px;
            height: 20px;
        }
        td.cell-black {
            background-color: #000;
        }
    </style>
</head>
<body>
    <h1>Занятие 4. Массивы</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="username" id="username" placeholder="имя пользователя">
            <input type="password" name="password" id="password" placeholder="Пароль">
            <input type="file" name="avatar" id="avatar">
            <input type="submit" value="Отправить">
        </form>


    <?php
    var_dump($_GET); // get-параметры
    echo "<br>";
    var_dump($_POST); // popst-параметры
    echo "<br>";
    print_r($_FILES); // файлы
    echo "<br>";
    var_dump($_COOKIE); // куки
    echo "<br>";
    var_dump($_SESSION); // сессия
    echo "<br>";
    var_dump($_REQUEST); // объединение массивов post и get
    echo "<br>";
    var_dump($_ENV); // переменные окружения
    ?>
</body>
</html>