<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Заголовок</h1>
    <p>А вот тут будет переменная.</p>
    <?php
        echo "Hello world";
        $a = 5;
    ?>
    <p>А это второй абзац. В нем я вывожу значение переменной $a: a = <?= $a; ?></p>

</body>
</html>