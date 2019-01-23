<?php
if (isset($_SESSION['errors'])){
    echo implode("<br>",$_SESSION['errors']);
}
unset($_SESSION['errors']);
?>

<div class="container mregister" style = "text-align:center">
<div id="login">
<form action="http://localhost/myproject/registration" id="registerform" method="post"name="registerform">
<p><label for="user_pass">E-mail:<br>
<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
<p><label for="user_login">Имя пользователя:<br>
 <input class="input" id="full_name" name="username"size="32"  type="text" value=""></label></p>
<p><label for="user_pass">Пароль:<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
	  <p class="regtext">Уже зарегистрированы? <a href= "http://localhost/myproject/login">Введите имя пользователя</a>!</p>
</form>
</div>
</div>


