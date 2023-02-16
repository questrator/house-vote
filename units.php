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
            if (values.length > 1) pricelist.push(item);
        });
        data[id] = {city, type, date, pricelist,};
    });
    console.log(data);

    function getServices(data) {
        const services = new Set();
        for (let item of data) {
            for (let price of item.pricelist) {
                const name = Object.keys(price).filter(e => e.includes("имен"))[0];
                services.add(price[name]);
            }
        }
        
        console.log(Array.from(services).sort());
    }
    getServices(data);

    </script>

</body>
</html>