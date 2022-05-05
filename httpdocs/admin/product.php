<?php
require_once '../../lib/connection.php';
if (isset($_POST['sku'])) {
    var_dump($_POST);
    die;
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
            
        <?php if (isset($_GET['action'])) : ?>
        
            <?php if ($_GET['action'] == 'show'): ?>
            <h2>Один товар</h2>

            <?php elseif ($_GET['action'] == 'create'): ?>
            <h2>Создаем товар</h2>
                <form action="product.php" method="post">
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
                            <option value="2">Канцтовары</option>
                        </select>
                    </div>
                    <div class="form_control">
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Описание"></textarea>
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
            
            <?php elseif ($_GET['action'] == 'delete'): ?>
            <h2>Удаление товара</h2>

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
                    <?= $row['cat_name'] ?> / <a href="product.php?action=show&id=<?= $row['p_id']?>"><?= $row['p_name'] ?></a>
                </div>
            <?php endwhile ?>

        <?php endif; ?>
        </div>
    </div>
        
        
</body>
</html>