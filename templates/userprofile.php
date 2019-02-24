<?php include_once'header.php'; ?>

<title>Профиль</title>
<a href="<?=route('home'); ?>">На главную</a>

<h1>Профиль</h1>
<form method="post" action=""  enctype="multipart/form-data">
<b>Логин</b> : <b><?= trim($user['username']);?></b><br>
<b>E-mail</b> : <b><?= trim($user['email']); ?></b><br>
<b>Аватар</b> :<br>
    <?php
        if(!empty($user['avatar'])): ?>
            <img src="/assets/avatar/<?=$user['avatar'] ?>">
    <?php endif; ?>

<br><br><br><br><br>

    <button type="submit" name="edit">Изменить данные</button>
</form>
<br><br><br><br><br>


