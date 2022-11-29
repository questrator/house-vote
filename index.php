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
            foreach($houses as $key => $value) {
        ?>

        <div>
            <span><?= "$value[0]" ?></span>
            <span><?= "$value[1]" ?></span>
            <span><a href="update.php?id_house=<?= $value[0] ?>">ред</a></span>
        </div>

        <?php
            }
        ?>
        <form action="create.php" method="post">
            <input type="text" name="address" placeholder="адрес" required>
            <input type="submit" value="Добавить">
        </form>
    </div>
</body>
</html>
