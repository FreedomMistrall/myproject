<?php
require_once 'templates/header.php';
if (isset($_SESSION['errors']))
{?>
    <div class="alert alert-danger" role="alert">
        <p align="center"><?=$_SESSION['errors'];?></p>
    </div>
<?php }
unset($_SESSION['errors']);
?>

<div class="container mlogin" style = "text-align:center">
    <div id="login">
        <form action="http://localhost/myproject/login" id="loginform" method="post"name="loginform">
            <p><label for="email">E-mail:<br>
            <input class="input" id="email" name="email"size="25"
            type="text" value=""></label></p>
            <p><label for="user_pass">Пароль:<br>
             <input class="input" id="password" name="password"size="25"
              type="password" value=""></label></p> 
            <p class="submit"><input class="button" name="login"type= "submit" value="Войти"></p>
            <p class="regtext">Еще не зарегистрированы?
            <p><a href="http://localhost/myproject/registration">Зарегестрироваться</a></p>

        </form>
    </div>
</div>

