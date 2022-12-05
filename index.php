<?php
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Голосование</title>
</head>
<body>
    <div>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM `houses`");
            $houses = mysqli_fetch_all($query);
            for ($i = 0; $i < count($houses); $i++) {
        ?>

        <div>
            <span><?= $houses[$i][0] ?></span>
            <span><?= $houses[$i][1] ?></span>
            <span><a href="update.php?id_house=<?= $houses[$i][0] ?>">ред</a></span>
        </div>

        <?php
            }

            $a = "f";
            echo "<pre>";
            echo $a * "f";
            echo "</pre>";
        ?>
        <form action="create.php" method="post">
            <input type="text" name="address" placeholder="адрес" required>
            <input type="submit" value="Добавить">
        </form>
    </div>
</body>
</html>
