<?php
$txt = date('Y-m-d H:i:s', time()) . "\tОбращение к странице\n";
$result = file_put_contents('../data/log.txt', $txt, FILE_APPEND);
$arr = $_GET;
foreach ($arr as $key => $value) {
    file_put_contents('../data/data.csv', $key . ';' . $value . ';', FILE_APPEND);
}
file_put_contents('../data/data.csv', "\n", FILE_APPEND);
?>
<h3>Занятие 5. Работа с файлами</h3>
<?php
if ($result) {
    echo 'Запись прошла успешно', $result, "<br>";
}

// читаем файл с результатами
$txt = file_get_contents('../data/data1.csv');
$arr = explode("\n", $txt);
$results = [];
foreach ($arr as $value) {
    $txt1 = explode(',', $value);
    $results[$txt1[0]] = (int)$txt1[1];
}
$best = -1;
foreach ($results as $key => $value) {
    if ($value > $best) {
        $best = $value;
        $name = $key;
    }
}
echo "Победил $name с результатом $best.<br>";