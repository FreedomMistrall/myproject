<?php
require_once 'header.php'; ?>

<?php
    $message = oldData();
?>

<div class="container mregister" style = "text-align:center">
    <div id="login">
        <form action="<?=route('registr'); ?>" id="registerform" method="post" name="registerform">
            <p><label for="user_mail">E-mail:<br>
                <input class="input" id="email" name="email" size="32" type="email" value="<?= !empty($message) ? $message['email'] : ''; ?>"></label></p>
            <p><label for="user_login">Имя пользователя:<br>
                <input class="input" id="username" name="username" size="32" type="text" value="<?= !empty($message) ? $message['username'] : ''; ?>"></label></p>
            <p><label for="user_pass">Пароль:<br>
                <input class="input" id="password" name="password" size="32" type="password" value=""></label></p>
            <p><label for="user_pass">Подтвердите пароль:<br>
                <input class="input" id="password2" name="password2" size="32" type="password" value=""></label></p>
            <p class="submit"><input class="button" name="register" type="submit" value="Зарегистрироваться"></p>
            <p class="regtext">Уже зарегистрированы? <a href="<?=route('login'); ?>">Введите имя пользователя</a>!</p>
        </form>
    </div>
</div>


