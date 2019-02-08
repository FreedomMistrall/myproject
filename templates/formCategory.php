<a href="<?=route('category')?>">Назад</a>

<form action="" method="post">
    <p><label for="name">Category:<br>
        <input class="input" id="category" name="category" size="30" type="text" value="<?= isset($_GET['id']) ? $category['category'] : ''?>"></label></p>
    <p class="submit"><input class="button" name="submit" type="submit" value="Сохранить"></p>
</form>