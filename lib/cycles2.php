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
    <h1>Занятие 3. Циклы. Часть 2</h1>
    <h2>Строим таблицу 5 х 7</h2>
    <table>
        <?php
            $rows = 5; $cols = 7;
            for ($row = 0; $row < $rows; $row++) {
                echo '<tr>';
                for ($col = 0; $col < $cols; $col++) {
                    echo "<td>$row - $col</td>";
                }
                echo '</tr>';
            }
        ?>
    </table>
    <h2>Шахматная доска</h2>
    <table>
    <?php
        $rows = 8; $cols = 8;
        for ($row = 0; $row < $rows; $row++) {
            echo '<tr>';
            for ($col = 0; $col < $cols; $col++) {
                if (($row + $col) % 2 != 0) {
                    echo "<td class=\"cell-black\"></td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo '</tr>';
        }
    ?>
    </table>

    <h2>Шахматная доска. Вариант 2</h2>
    <table>
    <?php
        $rows = 8; $cols = 8;
    ?>
    <?php for($row = 0; $row < $rows; $row++) : ?>

            <tr>
                <?php for ($col = 0; $col < $cols; $col++) : ?>

                    <?php if (($row + $col) % 2 != 0) : ?>
                        <td class="cell-black"></td>
                    <?php else: ?>
                        <td></td>
                    <?php endif ?>
                <?php endfor ?>
            </tr>
    <?php endfor ?>
    </table>
</body>
</html>