<?php require "layouts/header.php"; ?>
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
            <h2>Регистрация</h2>
            <p>Если вы ранее регистрировались, вы можете авторизироваться <a href="login.php">здесь</a>.</p><br>
            <?php if (!empty($err)) : ?>
                <div class="err">
                    <ul>
                        <?php foreach ($err as $e) : ?>
                            <li><?= $e; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="success">
                    <?= $success; ?>
                </div>
            <?php else : ?><br>
                <form enctype="multipart/form-data" method="post" action="user.php">
                    <div class="col col_13 checkout">
                        Имя*:
                        <input type="text" name="name" value="<?= htmlspecialchars($name); ?>" style="width:300px;"/>
                        Пароль*:<br>
                        <span style="font-size:10px">Пароль должен содержать больше 6 символов</span>
                        <input type="text" name="password" value="<?= htmlspecialchars($password); ?>"
                               style="width:300px;"/>
                        Повторите пароль*:
                        <input type="text" name="second_pass" value="<?= htmlspecialchars($second_pass); ?>"
                               style="width:300px;"/>
                        Аватар:<br/>
                        <input type="file" name="avatar">
                        <br>
                        <input type="hidden" name="action" value="register">
                        <input type="submit" class="btn" name="submit" value="зарегистрироваться">

                    </div>
                    <div class="col col_13 checkout">
                        E-MAIL:
                        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>" style="width:300px;"/>
                        Телефон*:<br/>
                        <span style="font-size:10px">Пример (+380660453483, 80660453483, 0660453483)</span>
                        <input type="text" name="phone" value="<?= htmlspecialchars($phone); ?>" style="width:300px;"/>
                    </div>
                </form>
            <?php endif; ?>
    </div> <!-- END of content -->
    <div class="cleaner"></div>
</div> <!-- END of main -->
<?php require "layouts/footer.php"; ?>
