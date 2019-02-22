<p style="margin-left: 10px;"><a href="<?= route('admin') ?>">Назад</a></p>
<br>

<form action="" method="post">
    <p><label for="name">Image :<br>
        <input class="input" id="image" name="image" size="30" type="text" value="<?= isset($_GET['id']) ? $item['image'] : ''?>"></label></p>

    <p><label for="name">Image1 :<br>
        <input class="input" id="image" name="image1" size="30" type="text" value="<?= $image['image']?>"></label></p>
    <p><label for="name">Image2 :<br>
        <input class="input" id="image" name="image2" size="30" type="text" value="<?= $image['image']?>"></label></p>

    <p><label for="name">AddImage :<br>
        <input class="input" id="newImage" name="newImage" size="30" type="text" value=""></label></p>

    <p class="submit"><input class="button" name="submit" type="submit" value="Сохранить"></p>

</form>

