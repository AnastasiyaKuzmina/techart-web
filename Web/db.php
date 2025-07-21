<?php
require "config.php";
$conn = mysqli_connect($host, $user_name, $password, $db);

if (!$conn) {
    die('Ошибка подключения: ' . mysqli_error());
}
?>