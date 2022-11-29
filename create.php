<?php
require_once "connect.php";

$address = $_POST["address"];

$query = mysqli_query($connect, "INSERT INTO `houses` (`id`, `address`) VALUES (NULL, '$address');");

header('Location: index.php');