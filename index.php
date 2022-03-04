<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Каскадное ветвление
        $a = 5; $b = 5;
        if ($a > $b) {
            echo 'Первая переменная больше';
        } else if ($a < $b) {
            echo 'Вторая переменная больше';
        } else {
            echo 'Переменные равны';
        }

    // оператор выбора
        $now = 'evening';
        switch ($now) {
            case 'morning':
                echo 'Доброе утро';
                break;
            case 'day':
                echo 'Добрый день';
                break;
            case 'evening':
                echo 'Добрый вечер';
                break;
            case 'nigth':
                echo 'Доброй ночи';
                break;
            default:
                echo 'Ээээ...';
        }

        // тернарный оператор
        // присвоить переменной с максимум из a и b
        $a = 5;
        $b = 7;
        $c = $a > $b ? $a : $b;
        echo 'c = ', $c;
    ?>

</body>
</html>