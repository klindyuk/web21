<?php
// Определяем функцию
function sayHello() {
    echo '<h1>Добрый вечер!</h1>';
}

// вызываем функцию
sayHello();

// процедура с параметрами. Параметр b имеет значение по умолчанию.
function compare($a, $b=0) {
    if ($a > $b) {
        echo 'Первое число больше';
    } else if ($a < $b) {
        echo 'Второе число больше';
    } else {
        echo 'Числа равны';
    }
    echo '<br>';
}

compare(2, 3);
compare(7, 1);
compare(-7);

// Функция, возвращающая значение
function average($a, $b) {
    $result = ($a + $b) / 2;
    return $result;
}

$t = average(10, 12);
echo 'Среднее арифметическое: ', $t, "<br>";

// Рекурсия. Посчитаем n число Фибоначчи

function f($n) {
    if ($n < 2) return $n;
    else return f($n - 1) + f($n - 2);
}

echo '7-е число Фибоначчи: ', f(7), "<br>";

?>