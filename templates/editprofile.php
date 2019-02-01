<?php
require_once 'header.php'; ?>
<title>Изменить данные</title>
<a href="<?=route('user'); ?>">Назад</a>

<br>
<h2 class="form">Изменить данные</h2>
<div class="form">
<form method="post" action=""  enctype="multipart/form-data">
<lable for="user_mail"><b>E-mail : </b><input type="email" value="<?= trim($user['email']);?> " disabled></lable><br><br>
<lable for="user_login"><b>Логин : </b><input type="text" name="username" value="<?= trim($user['username']);?>"></lable><br><br>
<lable for="user_pass"><b>Новый пароль : </b><br>
    <input type="password" name="password" size="32" value=""></lable><br>
<lable for="user_pass"><b>Подтвердите новый пароль : </b><br>
    <input type="password" name="password2" size="32" value=""></lable><br><br><br>
<b>Аватар : </b>
<br>
    <?php
        if(!empty($user['avatar'])): ?>
            <img src="/assets/avatar/<?=$user['avatar'] ?>">
    <?php endif; ?>
<br>

<input name="img_url" type="file">

<br><br><br><br><br>
    <lable for="user_pass"><b>Текущий пароль : </b><br>
        <input type="password" name="nowpassword" size="32" value=""></lable><br>
<input class="button" type="submit" name="submit" value="Сохранить изменения">
</form>
</div>