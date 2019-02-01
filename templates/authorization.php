<?php
require_once 'header.php'; ?>

<?php
    $message = oldData();
?>


<div class="container mlogin" style = "text-align:center">
    <div id="login">
        <form action="<?=route('login'); ?>" id="loginform" method="post" name="loginform">
            <p><label for="email">E-mail:<br>
                <input class="input" id="email" name="email" size="25" type="text" value="<?= !empty($message) ? $message['email'] : ''; ?>"></label></p>
            <p><label for="user_pass">Пароль:<br>
                <input class="input" id="password" name="password" size="25" type="password" value=""></label></p><br>
            <p class="submit"><input class="button" name="login" type= "submit" value="Войти"></p>
            <p class="regtext">Еще не зарегистрированы? <a href="<?=route('registr'); ?>">Зарегестрироваться</a>!</p>
        </form>
    </div>
</div>

