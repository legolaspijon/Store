<?php
$db = mysqli_connect("37.252.123.142", "fomichev_pijon", "legolaspijon200512", "fomichev_store");

if (!$db) {
    echo "Ошибка подключения к базе данных" . mysqli_connect_error();
    exit;
}
