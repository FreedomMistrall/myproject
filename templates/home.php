<?php 
include_once 'header.php';
include_once 'navbar.php';
?>

<?php if($user): ?>
        <p style="color: darkslategray"><b>Привет <?= $user['username']?></b></p>
        <p><a href="<?=route('user'); ?>" style="color: #1b1cbc"><b>Личный кабинет</b></a></p>
        <p><a href="<?=route('logout'); ?>" style="color: black"><b>Выход</b></a></p>

<?php endif; ?>

<?php if($userAdmin): ?>
        <a href="<?=route('admin'); ?>" style="color: red"><b>Админка</b></a>
<?php endif; ?>
<br>
<form name="search" action="">
    <input type="search" name="search" size="30" placeholder="Поиск">
    <button type="submit">Найти</button>
</form>
<br>
<form name="sort" method="post" action="">
    <div class="box_inner">
        <input type="hidden" id="filter_min_price" value="6201">
        <input type="hidden" id="filter_max_price" value="200569">
        <input type="text" name="priceMin" id="filter_current_min_price" placeholder="От" value="">
        -
        <input type="text" name="priceMax" id="filter_current_max_price" placeholder="До" value="">
        <button name="sort" type="submit">Сортировать</button>
    </div>
</form>
<br>
<div class="dropdown" align="right">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Сортировать
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?=route('home')?>?sort=new">Новинки</a>
        <a class="dropdown-item" href="<?=route('home')?>?sort=price-asc">От дешевых</a>
        <a class="dropdown-item" href="<?=route('home')?>?sort=price-desc">От дорогих</a>
    </div>
</div>

<div class="container">
	<div class="row">

		<?php
            foreach ($oneItem as $item){
		        include 'components/card.php';
		    }
        ?>
	</div>
</div>

<div align="center">
<?=$pagination; ?>
</div>

<br>
<?php if(!empty($last3ItemsId)): ?>
<b>Недавно просмотренные:</b>

<div class="container">
	<div style="width: 70%;">
		<div class="row">
		    <?php
                foreach ($last3ItemsId as $item){
                    include 'components/card.php';
                }
            ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php
if(!$cookieOk){
    include 'templates/components/cookie.php';
}
?>

<?php include_once 'footer.php'; ?>

