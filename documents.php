<?php
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Собственность <?= "375"?></title>
    <link rel="stylesheet" href="./css/normalize.css"/>
    <link rel="stylesheet" href="./css/styles.css"/>
</head>
<body>
    <table class="units-table">
        <caption>Помещения</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>пароль</th>
                <th>паспорт</th>
                <th>телефон</th>
                <th>активность</th>
                <th>информация</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM documents
            LEFT JOIN units
            ON units.unit_id = documents.unit_id
            LEFT JOIN owners
            ON owners.owner_id = documents.owner_id
            INNER JOIN unit_types
            ON unit_types.unit_type_id = units.type_id
            WHERE documents.unit_id = 112
            ");
            $tables = mysqli_fetch_all($query);
            ?><pre><?php  ?></pre><?php
            $json = [];
            for ($i = 0; $i < count($tables); $i++) {
                $unit = [$tables[$i][0], $tables[$i][1], $tables[$i][2], $tables[$i][3], $tables[$i][4], $tables[$i][5], $tables[$i][6], $tables[$i][7], $tables[$i][8], $tables[$i][9], $tables[$i][10], $tables[$i][11], $tables[$i][12], $tables[$i][13], $tables[$i][14], $tables[$i][15], $tables[$i][16], $tables[$i][17], $tables[$i][18], $tables[$i][19], $tables[$i][20], $tables[$i][21], $tables[$i][22], $tables[$i][23], $tables[$i][24]];
                array_push($json, $unit);
                // $s += $tables[$i][3];
                ?>
                <tr class="align-center">
                    <td class="owner-id"><?= $tables[$i][0]; ?></td>
                    <td class="owner-lastname"><?= $tables[$i][1]; ?></td>
                    <td class="owner-name"><?= $tables[$i][2]; ?></td>
                    <td class="owner-midname"><?= $tables[$i][3]; ?></td>
                    <td class="owner-password"><?= $tables[$i][4]; ?></td>
                    <td class="owner-passport"><?= $tables[$i][5]; ?></td>
                    <td class="owner-phone"><?= $tables[$i][6]; ?></td>
                    <td class="owner-activity"><?= $tables[$i][7]; ?></td>
                    <td class="owner-info"><a href="/owner.php?unit=<?= $tables[$i][0]; ?>">инфо</a></td>
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
                <td class="json"><?php echo ("") ?></td>
            </tr>
        </tfoot>
    </table>
    
    <script>
        const json = <?php echo json_encode($json) ?>;
        console.log(json);
    </script>

</body>
</html>