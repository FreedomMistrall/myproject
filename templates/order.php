<?php include_once'header.php'; ?>

<form action="" method="post" style = "text-align: center;">
    <p><label for="name">Имя получателя:<br>
            <input class="input" id="name" name="name" size="40" type="text" value=""></label></p>
    <p><label for="phone">Контактный телефон:<br>
            <input class="input" id="phone" name="phone" size="40" type="text" value=""></label></p>
    <p><label for="address">Адрес:<br>
            <input class="input" id="address" name="address" size="40" type="text" value=""></label></p>

    <p class="submit"><input class="button" name="submit" type="submit" value="Отправить заказ"></p>

</form>



<?php include_once'footer.php'; ?>

