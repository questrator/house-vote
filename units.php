<?php
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Помещения <?= "ff"?></title>
</head>
<body>
    <div>Помещения</div>
    <table>
        <thead>
            <th>ID</th>
            <th>номер</th>
            <th>тип</th>
            <th>площадь, кв. м</th>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM `units`");
            $tables = mysqli_fetch_all($query);
            ?><pre><?php echo(`dir`); ?></pre><?php
            for ($i = 0; $i < count($tables); $i++) {
                ?>
                <tr>
                    <td><?= $tables[$i][0]; ?></td>
                    <td><?= $tables[$i][1]; ?></td>
                    <td><?= $tables[$i][2]; ?></td>
                    <td><?= $tables[$i][3]; ?></td>
                </tr>
                <?
            }            
        ?>
        </tbody>
    </table>
    
    

</body>
</html>