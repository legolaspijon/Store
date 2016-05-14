<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="web store, free templates, website templates, CSS, HTML"/>
    <meta name="description" content="Web Store Theme - free CSS template provided by templatemo.com"/>
    <title>Главная</title>
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css"/>
    <link href="css/slider_styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
</head>

<body id="home">
<div class="social">
    <ul>
        <li><a href="#"><img src="images/ico_fb.png"></a></li>
        <li><a href="#"><img src="images/ico_tvtr.png"></a></li>
        <li><a href="#"><img src="images/ico_g.png"></a></li>
        <li><a href="#"><img src="images/ico_in.png"></a></li>
    </ul>
</div>
<div id="templatemo_wrapper">
    <div id="templatemo_header">
        <div id="site_title">
            <img src="images/off.png"/>
            <h1>Интернет-магазин</h1>
            <h4>компьютерной техники</h4>
        </div>
        <div id="header_right">
            <div class="cleaner"></div>
            <span class="checkout">
            <?php if (isset($_SESSION['login'])) : ?>
                <a href="cabinet.php"><?= $_SESSION['login']; ?></a> <img width="30" src="<?=$_SESSION['avatar']?>"> (<a href="logout.php">Выход</a>)
            <?php else : ?>
                <a href="login.php">Вход</a>
            <?php endif; ?>
                | <a href="register.php">Регистрация</a>
            </span><br>
            <div class="cart">
                <span>Ваша корзина пуста</span>
            </div>
        </div> <!-- END -->
    </div> <!-- END of header -->

    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" class="selected">Главная</a></li>
            <li><a href="products.php">Продукты</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="faqs.php">FAQs</a></li>
            <li><a href="contact.php">Контакты</a></li>
        </ul>
        <div id="templatemo_search">
            <form action="#" method="get">
                <input type="text" name="keyword" class="txt_field"/>
                <input type="submit" name="search_submit" value="" alt="" id="searchbutton" title="Search"
                       class="sub_btn"/>
            </form>
        </div>
    </div> <!-- end of templatemo_menu -->
