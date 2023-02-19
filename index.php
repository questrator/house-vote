<?php
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Bitrix export</title>
</head>
<body>
    <div>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM `units`");
            $tables = mysqli_fetch_all($query);
            for ($i = 0; $i < count($tables); $i++) {
                echo $tables[$i][0];
            }
        ?>
        
    </div>
    
    <script>
        
    </script>

</body>
</html>