<?php 
include_once 'templates/header.php';
include_once 'templates/navibar.php';

?>

<div class="container">
	<div class="row">
		
		<?php foreach ($oneItem as $item){
		include 'components/card.php'; 
		} ?>

	</div>
</div>

<b>Недавно просмотренные:</b>
<div class="container">
	<div style="width: 70%;">
		<div class="row"> 
		<?php
                    foreach ($last3ItemsId as $item){
                        include 'components/card.php';
                    } ?>
		</div>
	</div>
</div>

<?php include_once 'templates/footer.php'; ?>