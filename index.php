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
            $query = mysqli_query($connect, "SELECT `DETAIL_TEXT` FROM `b_iblock_element` WHERE (`IBLOCK_ID` = 6 AND `DETAIL_TEXT` != '' AND `ACTIVE` = 'Y');");
            $tables = mysqli_fetch_all($query);
            for ($i = 0; $i < count($tables); $i++) {
                echo $tables[$i][0];
            }
        ?>
        
    </div>
    
    <script>
    const tables = document.querySelectorAll("table");
    const data = [];
    tables.forEach((table, id) => {
        const city = table.querySelector(".price-city")?.textContent.split(" ").pop();
        const type = table.querySelector(".price-type")?.textContent;
        const date = table.querySelector(".price-date")?.textContent.split(" ").shift();
        const headers = Array.from(table.querySelectorAll("th")).map(th => th.textContent);
        const rows = table.querySelector("tbody").querySelectorAll("tr");
        const pricelist = [];
        rows.forEach((row) => {
            const item = {};
            const values = Array.from(row.querySelectorAll("td")).map(td => td.textContent.trim().replace(/\s{2,}/gi, " "));
            values[values.length - 1] = parseInt(values[values.length - 1].replace(/\s/, ""));
            headers.forEach((header, i) => item[header] = values[i]);
            pricelist.push(item);
        });
        data[id] = {city, type, date, pricelist,};
    });
    console.log(data);
</script>

</body>
</html>