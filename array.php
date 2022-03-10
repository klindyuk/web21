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
    <h1>Занятие 3. Массивы</h1>
    <?php
        $arr = [];
        $arr[] = 3;
        $arr[] = 5;
        $arr[] = 10;

        var_dump($arr);

        $arr[0] = 13;
        var_dump($arr);

        $arr[6] = 6;
        var_dump($arr);

        $arr[] = 10;
        var_dump($arr);

        $arr["home"] = 0;
        var_dump($arr);

    ?>

    <h2>Вывод элементов массива</h2>
    <?php foreach($arr as $key => $value) : ?>
        <p>Ключ: <?= $key ?>. Значение: <?= $value ?></p>
    <?php endforeach ?>

    <h2>Вывод элементов массива (только значения)</h2>
    <?php foreach($arr as $value) : ?>
        <p><?= $value ?></p>
    <?php endforeach ?>
</body>
</html>