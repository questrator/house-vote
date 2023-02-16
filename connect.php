<?php

$connect = mysqli_connect("localhost", "root", "", "evote");

if(!$connect) die("Ошибка подключения к базе данных");