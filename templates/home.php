<?php 
include_once 'header.php';
include_once 'navibar.php';
?>

<?php
    if($user):
?>
        <p style="color: darkslategray"><b>Привет <?= $user['username']?></b></p>
        <p><a href="<?=route('user'); ?>" style="color: #1b1cbc"><b>Личный кабинет</b></a></p>
        <p><a href="<?=route('logout'); ?>" style="color: black"><b>Выход</b></a></p>

<?php
    endif;
?>

<?php
    if($userAdmin):
?>
        <a href="<?=route('admin'); ?>" style="color: red"><b>Админка</b></a>
<?php
    endif;
?>

<div class="container">
	<div class="row">

		<?php
            foreach ($oneItem as $item){
		        include 'components/card.php';
		    }
        ?>
	</div>
</div>

<?php
    if(!empty($last3ItemsId)): ?>
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
<?php include_once 'templates/footer.php'; ?>