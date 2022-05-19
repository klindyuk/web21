<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
require_once '../../lib/connection.php';
if (count($_POST) > 0) {
    switch ($_POST["_method"]) {
        case "post":
            $sku = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["sku"]));
            $name = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["name"]));
            $description = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["description"]));
            $price = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["price"]));
            $category_id = (int)$_POST["category_id"];
            if (isset($_FILES["image"])) {
                $media_dir = $_SERVER["DOCUMENT_ROOT"] . "/media/products/";
                mkdir($media_dir . $sku, 0777, TRUE);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $media_dir . $sku . "/" . $_FILES["image"]["name"])) {
                    $image = $sku . "/" . $_FILES["image"]["name"];
                } else {
                    $image = NULL;
                }
            }
            $result = mysqli_query($link, "INSERT INTO `products` (`id`, `sku`, `name`, `description`, `price`, `category_id`, `photo`) VALUES (NULL, '$sku', '$name', '$description', '$price', $category_id, '$image');");
            if ($result) $message = "Запись успешно добавлена";
            else $message = "Ошбика";
            break;
        case "put":
            $sku = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["sku"]));
            $name = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["name"]));
            $description = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["description"]));
            $price = mysqli_real_escape_string($link, (string)htmlspecialchars($_POST["price"]));
            $category_id = (int)$_POST["category_id"];
            $id = (int)$_POST["id"];
            $result = mysqli_query($link, "UPDATE `products` SET `sku`='$sku', `name`='$name', `description`='$description', `price`='$price', `category_id`=$category_id WHERE `id`=$id;");
            if ($result) $message = "Запись успешно обновлена";
            else $message = "Ошбика";
            break;
        case "delete":
            $id = (int)$_POST["id"];
            $result = mysqli_query($link, "DELETE FROM `products` WHERE `id`=$id;");
            if ($result) $message = "Товар успешно удален";
            else $message = "Ошбика";
            break;
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
    <title>Товары</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><a href="category.php">Категории</a></li>
                    <li><a href="product.php">Товары</a></li>
                </ul>
            </nav>
        </div>
        <div class="main">
            <?php if (isset($message)): ?>
                <div class="message"><?= $message ?></div>
            <?php endif ?>
            <?php
            if (isset($_SESSION['username'])) echo 'привет, ' . $_SESSION['username'];
            ?>
            
        <?php if (isset($_GET['action'])) : ?>
            
            <?php if ($_GET['action'] == 'show'): ?>
            <h2>Один товар</h2>

            <?php elseif ($_GET['action'] == 'create'): ?>
            <h2>Создаем товар</h2>
                <form action="product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="post">
                    <div class="form_control">
                        <input type="text" name="sku" id="sku" placeholder="Артикул">
                    </div>
                    <div class="form_control">
                        <input type="text" name="name" id="name" placeholder="Название товара">
                    </div>
                    <div class="form_control">
                        <select name="category_id" id="category_id">
                        <?php $result = mysqli_query($link, "SELECT * FROM `categories` WHERE 1;"); ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?=$row["id"] ?>"><?=$row["name"] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form_control">
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Описание"></textarea>
                    </div>
                    <div class="form_control">
                        <input type="text" name="price" id="price" placeholder="Цена">
                    </div>
                    <div class="form_control">
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form_control">
                        <input type="submit" value="Отправить">
                    </div>
                    
                </form>
            <?php elseif ($_GET['action'] == 'edit'): ?>
            <h2>Редактируем товар</h2>
            <?php 
            $id = $_GET["id"];
            $result = mysqli_query($link, "SELECT * FROM `products` WHERE `id`=$id;"); 
            $product = mysqli_fetch_assoc($result);
            ?>
                <form action="product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form_control">
                        <input type="text" name="sku" id="sku" placeholder="Артикул" value="<?= $product["sku"] ?>">
                    </div>
                    <div class="form_control">
                        <input type="text" name="name" id="name" placeholder="Название товара" value="<?= $product["name"] ?>">
                    </div>
                    <div class="form_control">
                        <select name="category_id" id="category_id">
                        <?php $result = mysqli_query($link, "SELECT * FROM `categories` WHERE 1;"); ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?=$row["id"] ?>" <?php if ($row["id"] == $product["category_id"]) echo "selected"; ?>><?=$row["name"] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form_control">
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Описание" value="<?= $product["description"] ?>"></textarea>
                    </div>
                    <div class="form_control">
                        <input type="text" name="price" id="price" placeholder="Цена" value="<?= $product["price"] ?>">
                    </div>
                    <div class="form_control">
                        <input type="submit" value="Отправить">
                    </div>
                    
                </form>
            <?php elseif ($_GET['action'] == 'delete'): ?>
            <h2>Удаление товара</h2>
            <?php 
                $id = $_GET["id"];
                $result = mysqli_query($link, "SELECT * FROM `products` WHERE `id`=$id;"); 
                $product = mysqli_fetch_assoc($result);
            ?>
                <p>Товар <?= $product["name"] ?> будет удален. Это действие нельзя отменить. Продолжить?</p>
                <form action="product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" value="Удалить">
                </form>
                <a href="product.php">Отмена</a>
            <?php endif ?>

        <?php else: ?>
            <h2>Список товаров</h2>
            <div class="actions">
                <a href="product.php?action=create">Новый</a>
            </div>
            <?php
                $result = mysqli_query($link, "SELECT categories.name AS cat_name, categories.id, products.id AS p_id, products.name AS p_name FROM categories, products WHERE products.category_id = categories.id ORDER BY categories.name");
            ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div>
                    <?= $row['cat_name'] ?> / <a href="product.php?action=show&id=<?= $row['p_id']?>"><?= $row['p_name'] ?></a> <a href="product.php?action=edit&id=<?= $row['p_id']?>">Редактировать</a> <a href="product.php?action=delete&id=<?= $row['p_id']?>">Удалить</a>
                </div>
            <?php endwhile ?>

        <?php endif; ?>
        </div>
    </div>
        
        
</body>
</html>