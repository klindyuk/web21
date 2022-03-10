<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Занятие 3. Циклы</h1>
    <h2>Цикл с предусловием</h2>
    <?php
    // цикл с предусловием
        $n = 0;
        while ($n < 10) {
            echo $n, '<br>';
            $n++;
        }
    ?>
    <h2>Цикл с постусловием</h2>
    <?php
        $n = 0;
        do {
            echo $n, '<br>';
            $n++;
        } while ($n < 10)
    ?>
    <h2>Цикл со счетчиком</h2>
    <?php
        for ($i = 0; $i < 10; $i++) {
            echo $i, '<br>';
        }
        // некоторые (или даже все) парамерты цикла for можно оставлять пустыми
        for ($i = 0; $i < 10; ) {
            echo $i, '<br>';
            $i++;
        }
        // объединяем вывод значения и инкремент
        for ($i = 0; $i < 10; ) {
            echo $i++, '<br>';
        }
        // объединяем вывод значения и инкремент
        for ($i = 0; $i < 10; print_r($i++, '<br>')) {}
    ?>

    <h2>Операторы управления циклом break и continue</h2>
    <?php
    // break -- досрочное завершение цикла
        $i = 0;
        while($i < 10) {
            echo $i, '<br>';
            $i++;
            if ($i == 5) break;
        }
    // continue -- пропустить оставшиеся операторы и вернуться в начало цикла
        $i = 0;
        while ($i++ < 10) {
            if ($i == 5) continue;
            echo $i, '<br>';
        }
    ?>

</body>
</html>