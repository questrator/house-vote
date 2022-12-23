<?php

$connect = mysqli_connect("localhost", "root", "", "bitrix-export");

if(!$connect) die("Ошибка подключения к базе данных");