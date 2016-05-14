<?php require_once "layouts/header.php"; ?>

<div id="templatem_middle">
</div> <!-- END of middle -->
<div id="templatemo_main_top"></div>
<div id="templatemo_main">
    <div id="sidebar">
        <h3>Категории</h3>
        <ul class="sidebar_menu">
            <li><a href="#">Категория 1</a></li>
            <li><a href="#">Категория 2</a></li>
            <li><a href="#">Категория 3</a></li>
            <li><a href="#">Категория 4</a></li>
        </ul>
    </div> <!-- END of sidebar -->
    <div id="content">
        <h2>Авторизация</h2>
        <div class="err">
            <ul>
                <?php if (!empty($err)) : ?>
                    <?php foreach ($err as $e) : ?>
                        <li><?= $e; ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col col_13 login">
            <form action="user.php" method="post">
                Имя:
                <input type="text" name="name" style="width:300px;"/>
                Пароль:<br>
                <span style="font-size:10px">Пароль должен содержать больше 6 символов</span>
                <input type="password" name="password" style="width:300px;"/>
                <br>
                <input type="hidden" name="action" value="login">
                <input type="submit" class="btn" name="submit" value="авторизация">
            </form>
        </div>
    </div> <!-- END of content -->
    <div class="cleaner"></div>
</div> <!-- END of main -->
<?php require_once "layouts/footer.php"; ?>
