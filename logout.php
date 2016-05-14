<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['avatar']);
session_destroy();
header('location: index.php');