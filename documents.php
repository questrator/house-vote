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
        <caption>Документы</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>дркумент</th>
                <th>дата</th>
                <th>ФИО</th>
                <th>помещение</th>
                <th>номер</th>
                <th>доля</th>
                <th>площадь</th>
                <th>очередь</th>
                <th>подъезд</th>
                <th>этаж</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($connect, "SELECT
            documents.document_id,
            documents.title,
            documents.date,
            owners.lastname,
            owners.name,
            owners.midname,
            unit_types.description,
            units.number,
            documents.fraction,
            units.area,
            units.building,
            units.entrance,
            units.floor,
            documents.activity
            FROM documents
            LEFT JOIN units
            ON units.unit_id = documents.unit_id
            LEFT JOIN owners
            ON owners.owner_id = documents.owner_id
            INNER JOIN unit_types
            ON unit_types.unit_type_id = units.type_id
            WHERE documents.activity = 1
            ");
            $tables = mysqli_fetch_all($query);            
            $json = [];
            for ($i = 0; $i < count($tables); $i++) {
                $unit = [$tables[$i][0], $tables[$i][1], $tables[$i][2], $tables[$i][3], $tables[$i][4], $tables[$i][5], $tables[$i][6], $tables[$i][7], $tables[$i][8], $tables[$i][9], $tables[$i][10], $tables[$i][11], $tables[$i][12], $tables[$i][13], $tables[$i][14], $tables[$i][15], $tables[$i][16], $tables[$i][17], $tables[$i][18], $tables[$i][19], $tables[$i][20], $tables[$i][21], $tables[$i][22], $tables[$i][23], $tables[$i][24], $tables[$i][25]];
                array_push($json, $unit);
                // $s += $tables[$i][3];
                ?>
                <tr class="align-center">
                    <td class="owner-id"><?= $tables[$i][0]; ?></td>
                    <td class="owner-lastname"><?= $tables[$i][1]; ?></td>
                    <td class="owner-name"><?= $tables[$i][2]; ?></td>
                    <td class="owner-midname"><a href="/owners.php?owner=<?= $tables[$i][7]; ?>"><?= $tables[$i][3] . " " . $tables[$i][4] . " " . $tables[$i][5]; ?></a></td>
                    <td class="owner-phone"><?= $tables[$i][6]; ?></td>
                    <td class="owner-activity"><a href="/units.php?unit=<?= $tables[$i][7]; ?>"><?= $tables[$i][7] ?></a></td>
                    <td class="owner-activity"><?= $tables[$i][8]; ?></td>
                    <td class="owner-activity"><?= $tables[$i][9]; ?></td>
                    <td class="owner-activity"><?= $tables[$i][10]; ?></td>
                    <td class="owner-activity"><?= $tables[$i][11]; ?></td>
                    <td class="owner-activity"><?= $tables[$i][12]; ?></td>
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