<?php
$db = mysqli_connect("127.0.0.1", "root", "", "webstore");

if (!$db) {
    echo "Ошибка подключения к базе данных" . mysqli_connect_error();
    exit;
}
