<div class="container">
	<div class="row">

		<?php foreach ($items as $item) {
		include 'components/card.php'; 
		}
	?>

	</div>
</div>
Недавно просмотренные:
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
		?>
		</div>
	</div>
</div>