<?php include_once'header.php'; ?>

<a href="<?=route('admin')?>">Назад</a>

<form action="" method="post">
    <p><label for="name">Name:<br>
        <input class="input" id="name" name="name" size="30" type="text" value="<?= isset($_GET['id']) ? $item['name'] : ''?>"></label></p>
    <p><label for="name">Category:<br>
            <input class="input" id="desc" name="desc" size="30" type="text" value="<?= isset($_GET['id']) ? $item['category_id'] : ''?>"></label></p>
    <p><label for="name">Description:<br>
            <input class="input" id="desc" name="desc" size="30" type="text" value="<?= isset($_GET['id']) ? $item['description'] : ''?>"></label></p>
    <p><label for="price">Price:<br>
        <input class="input" id="price" name="price" size="30" type="text" value="<?= isset($_GET['id']) ? $item['price'] : ''?>"></label></p>
    <p><label for="stock">Stock:<br>
        <input class="input" id="stock" name="stock" size="30" type="text" value="<?= isset($_GET['id']) ? $item['stock'] : ''?>"></label></p>
    <p><label for="disc">Discount:<br>
        <input class="input" id="disc" name="disc" size="30" type="text" value="<?= isset($_GET['id']) ? $item['disc'] : ''?>"></label></p>
    <p><label for="img">Image:<br>
            <input class="input" id="img" name="img" size="30" type="text" value="<?= isset($_GET['id']) ? $item['image'] : ''?>"></label></p>
    <p class="submit"><input class="button" name="submit" type="submit" value="Сохранить"></p>
</form>