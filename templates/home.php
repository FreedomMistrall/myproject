<div class="container">
	<div class="row">
		
		<?php foreach ($items as $item) {
		include 'components/card.php'; 
		}
	?>

	</div>
</div>
<?php if (isset($_SESSION['itemsId'])) { ?>
<b>Недавно просмотренные:</b>
<div class="container">
	<div style="width: 70%;">
		<div class="row">
		<?php
			$small = new Model();
			$items=$small->getDataItems();
			foreach ($_SESSION['itemsId'] as $value) {
			    foreach ($items as $item) {
			        if ($value == $item->id) {
			            include 'components/card.php';
			        }
			    }
			}
		} ?>
		</div>
	</div>
</div>