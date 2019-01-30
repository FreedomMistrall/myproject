<title>Изменить данные</title>
<a href="<?=route('user'); ?>">Назад</a>

<br><br><br>
<h1>Изменить данные</h1>
<form method="post" action=""  enctype="multipart/form-data">
<lable><b>E-mail : </b><input type="email" value="<?= trim($user['email']);?> " disabled></lable><br><br><br>
<lable><b>Логин : </b><input type="text" name="login" value="<?= trim($user['username']);?>"></lable><br><br><br>

<b>Аватар : </b>
<br>
    <?php
        if(!empty($user['avatar'])): ?>
            <img src="/assets/avatar/<?=$user['avatar'] ?>">
    <?php endif; ?>
<br>

<input name="img_url" type="file">

<br><br><br><br><br>

<input class="button" type="submit" name="submit" value="Сохранить">
</form>