<?php
session_start();
require_once "db.php";

function login()
{
    global $db;

    $err = array();

    if (isset($_POST['submit'])) {
        $login = trim($_POST['name']);
        $password = md5(trim($_POST['password']));
        if (empty($login) || empty($password)) {
            $err[] = "Заполните все поля!";
        } else {
            $sql = "SELECT `login`,`password`,`avatar` FROM `customer` WHERE login='$login'";
            $res = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($res);
            if (mysqli_num_rows($res) < 1) {
                $err[] = "нет такого юзера в системе!";
            }
            if ($login == trim($row['login']) && $password == trim($row['password'])) {
                $_SESSION['login'] = $login;
                $_SESSION['avatar'] = $row['avatar'];
                header('location: index.php');
            } else {
                $err[] = "Проверте логин или пароль не верны!";
            }
        }
        if (count($err) > 0) {
            require_once "login.php";
        }
    }
}


function register()
{
    global $db;
    $err = array();
    $name = '';
    $password = '';
    $second_pass = '';
    $email = '';
    $phone = '';


    //проверяем отправлена ли форма
    if ($_POST['submit']) {

        //получаем данные
        $avatar = array();
        $name = $_POST['name'];
        $password = trim($_POST['password']);
        $second_pass = trim($_POST['second_pass']);
        $avatar = $_FILES['avatar'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        //обрабатываем данные
        list($name, $phone, $email) = validate(array($name, $phone, $email));

        //проверяем входные данные на валидность
        if (!empty($name) && !empty($password) && !empty($phone) && !empty($second_pass)) {
            if ($password != $second_pass) {
                $err[] = "пароли не равны";
            }

            if (!checkName($name)) {
                $err[] = "имя должно содержать больше 2 и меньше 28 символов";
            }

            if (!checkPass($password)) {
                $err[] = "пароль должен содержать от 6 до 32 символов";
            }

            if (!checkEmail($email)) {
                $err[] = "не верный формат email";
            }

            if (!checkPhone($phone)) {
                $err[] = "не верный формат phone";
            }

            if (getUserByPhone($phone)) {
                $err[] = "пользователь с таким номером существует";
            }

            if ($_FILES['avatar']['error']) {
                $err[] = 'ошибка загрузки файла -' . $_FILES['avatar']['error'];
            }
        } else {
            $err[] = "Заполните поля со звездочкой (*)";
        }

        //путь к папке с аватарами
        $path_to_uploads = "uploads/";
        //путь к папке с названием файла
        $path_to_avatar = $path_to_uploads . $_FILES['avatar']['name'];
        //путь к временной папке
        $tmp = $_FILES['avatar']['tmp_name'];

        //если существует картинка с таким названием генерируем другое название
        if (file_exists($path_to_avatar)) {
            $chars = 'abcdefghijklmnop123456789';
            $numChars = strlen($chars);
            $prefix = '';
            for ($i = 0; $i < 5; $i++) {
                $prefix .= substr($chars, rand(1, $numChars) - 1, 1);
            }

            $path_to_avatar = $path_to_uploads . $prefix ."_". $_FILES['avatar']['name'];
        }

        if (!move_uploaded_file($tmp, $path_to_avatar)) {
           $err[] = 'ошибка перемещения файла из временной дериктории';
        }

        if (count($err) > 0) {
            require_once "register.php";
            return;
        }

        $password = md5($password);

        //записываем данные в БД
        $sql = "INSERT INTO `customer` (login, password, email, phone, avatar)
                VALUES ('$name', '$password', '$email', '$phone','$path_to_avatar')";
        $res = mysqli_query($db, $sql);

        //если все хорошо показываем форму и говорим об успешной регистрации
        if ($res) {
            $success = "Регистрация успешна, можете войти под своим логином и паролем";
            require_once "register.php";
        }
    }
}


function getUserByPhone($phone)
{
    global $db;

    $sql = "SELECT login
            FROM `customer` WHERE phone='$phone'";
    $res = mysqli_query($db, $sql);
    if(!$res) echo "херь";
    else
    return mysqli_num_rows($res);
}


function validate($params)
{
    $valid_data = array();
    foreach ($params as $variable) {
        $valid_data[] = trim(stripcslashes($variable));
    }
    return $valid_data;
}

function checkPass($pass)
{
    $len = mb_strlen($pass, "utf8");
    if ($len < 6 || $len > 32) {
        return false;
    }
    return true;
}


function checkName($name)
{
    $len = mb_strlen($name, "utf8");
    if ($len < 3 || $len > 28) {
        return false;
    }
    return true;
}

function checkPhone($phone)
{
    $pattern = "/^(8|\+38)?0\d{9}$/";
    if (!preg_match($pattern, $phone)) {
        return false;
    }
    return true;
}


function checkEmail($email)
{
    $pattern = "/^\w+@\w+\.\w{2,5}$/";
    if (empty($email) || preg_match($pattern, $email)) {
        return true;
    }
    return false;
}


switch ($_POST['action']) {
    case "login":
        login();
        break;
    case "register":
        register();
        break;
    default:
        include "page_404.php";
}
