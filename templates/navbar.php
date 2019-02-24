<nav class="navbar navbar-light" style="background-color: #BC8F8F;">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false" style="background-color: #DDBEC3;"><b>Меню</b></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #DDBEC3;">
            <a class="dropdown-item" href="<?=route('home'); ?>">На Главную</a>
        </div>
    </div>
		<span class="navbar-text">
            <?php
            if(!$user):
            ?>
                <p><a href="<?=route('login'); ?>"><b>Авторизация</b></a></p>
		    <?php endif;?>
		</span>

    <div class="smalcart">
        <a href="<?= route('cart') ?>"><img src="/assets/image/корзина.png"></a>
    </div>

</nav>
