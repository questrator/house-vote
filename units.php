<?php
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Помещения <?= "375"?></title>
    <link rel="stylesheet" href="./css/normalize.css"/>
    <link rel="stylesheet" href="./css/styles.css"/>
</head>
<body>
    <table class="units-table">
        <caption>Помещения</caption>
        <colgroup>
            <col class="align-center">
        </colgroup>
        <thead>
            <tr>
                <th>ID</th>
                <th>номер</th>
                <th>тип</th>
                <th>площадь,<br/>кв. м</th>
                <th>очередь</th>
                <th>подъезд</th>
                <th>этаж</th>
                <th>информация</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM units, unit_types WHERE unit_types.unit_type_id = units.type_id;");
            $tables = mysqli_fetch_all($query);
            ?><pre><?php  ?></pre><?php
            $json = [];
            for ($i = 0; $i < count($tables); $i++) {
                $unit = [$tables[$i][0], $tables[$i][1], $tables[$i][2], $tables[$i][3], $tables[$i][4], $tables[$i][5], $tables[$i][6], $tables[$i][7], $tables[$i][8], $tables[$i][9]];
                array_push($json, $unit);
                $s += $tables[$i][3];
                ?>
                <tr class="align-center">
                    <td class="unit-id"><?= $tables[$i][0]; ?></td>
                    <td class="unit-number"><?= $tables[$i][1]; ?></td>
                    <td class="unit-type"><?= $tables[$i][9]; ?></td>
                    <td class="unit-area"><?= $tables[$i][3]; ?></td>
                    <td class="unit-stage"><?= $tables[$i][4]; ?></td>
                    <td class="unit-entrance"><?= $tables[$i][5]; ?></td>
                    <td class="unit-floor"><?= $tables[$i][6]; ?></td>
                    <td class="unit-info"><a href="/unit.php?unit=<?= $tables[$i][0]; ?>">инфо</a></td>
                </tr>
                <?
            }
            
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td class="json"><?php echo ($s) ?></td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </tfoot>
    </table>
    
    <script>
        const json = <?php echo json_encode($json) ?>;
        console.log(json);
    </script>

</body>
</html>