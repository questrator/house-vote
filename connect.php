<?php

$connect = mysqli_connect("localhost", "root", "", "house-vote");

if(!$connect) {
    die("Ошибка подключения к базе данных");
}